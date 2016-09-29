#!/bin/bash
# Configure aljcepeda project and create project user
# ARGS: username, psql_password
if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi

if [ "$#" -ne 2 ]; then
    echo "Must provide project user and password"
    exit
fi
npm update
npm prune

mkdir public/libs
cp node_modules/backbone/backbone-min.js public/libs
cp node_modules/bluebird/js/browser/bluebird.min.js public/libs
cp node_modules/jquery/dist/jquery.min.js public/libs
cp node_modules/underscore/underscore-min.js public/libs
cp node_modules/knockout/build/output/knockout-latest.js public/libs
cp node_modules/bootstrap/dist/js/bootstrap.min.js public/libs
cp node_modules/bootstrap-material-design/dist/js/material.min.js public/libs
cp node_modules/bootstrap/dist/css/bootstrap.min.css public/libs
cp node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css public/libs
cp node_modules/requirejs/require.js public/libs
cp node_modules/bareutil/scripts/ajax.js public/libs/bareutil.ajax.js

useradd -m -p $2 $1
touch /home/$1/.psql_history >/dev/null 2>&1

content=`sed "s/\\$1/$1/g" /sources/aljcepeda/sql/init_user.sql`
sed -i -e "s/'bluebird'/'\/libs\/bluebird.min'/g" public/libs/bareutil.ajax.js

su postgres << EOF
    cd ~/
    createuser -DRS $1
    createdb -O $1 -T template1 $1
    psql -c "ALTER USER $1 WITH PASSWORD '$2';"
    psql -f /sources/aljcepeda/sql/init.sql
    echo "$content" | psql -d aljcepeda
EOF

cd ~/
mkdir "/home/$1/bash"
wget -O "/home/$1/bash/git-prompt.sh" https://gist.githubusercontent.com/ALJCepeda/d90844bf63e23a06d3d3/raw/d1975442c357c0351990ed6a7de70b8259a0f40d/gistfile1.sh
wget -O "/home/$1/.bashrc" https://gist.githubusercontent.com/ALJCepeda/dc006ba37c7befec4f42/raw/480f86b33575ba680cf4e773d7b48d6acafb80ae/gistfile1.sh
su << EOF
    echo "define('PGSQL_ALJCEPEDA', 'pgsql:host=localhost;dbname=aljcepeda;user=$1;password=$2');" >> aljcepeda.php;
EOF
chown -R "$1:root" "/home/$1/"

echo '<VirtualHost *:80>
  ServerName aljcepeda.com
  ServerAdmin admin@aljcepeda.com
  DocumentRoot /var/www/aljcepeda/public
  ErrorLog /var/www/aljcepeda/logs/error.log
  CustomLog /var/www/aljcepeda/logs/access.log combined
  DirectoryIndex /index.php
  FallbackResource /index.php
  ErrorDocument 404 /index.php
  SetEnv ENVIRONMENT "live"
</VirtualHost>

<Directory /var/www/aljcepeda/>
  Options Indexes FollowSymLinks MultiViews
  AllowOverride FileInfo Indexes
  order allow,deny
  allow from all
</Directory>' >> /etc/apache2/sites-available/aljcepeda.conf

a2enmod php7.0
a2enmod rewrite
a2enmod proxy
a2enmod proxy_http
a2enmod proxy_ajp
a2enmod rewrite
a2enmod deflate
a2enmod headers
a2enmod proxy_balancer
a2enmod proxy_connect
a2enmod proxy_html

a2dissite 000-default.conf
a2ensite aljcepeda.conf
echo 'Configured ALCepeda project'
