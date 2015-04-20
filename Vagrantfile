# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  config.vm.box = "ubuntu/trusty64"


  config.vm.hostname = "aljcepeda.dev"
  config.vm.network :forwarded_port, host: 2200, guest: 80

  config.vm.provision "shell", path: "https://gist.githubusercontent.com/ALJCepeda/a5767ed8a99f16a473a9/raw/b672b091e18b97cca9d04b9742f1d7aab121a2cd/gistfile1.sh"
  config.vm.provision "file", source: "~/.gitconfig", destination: ".gitconfig"
  config.vm.provision "file", source: "~/.bash_profile", destination: ".bash_profile"
  config.vm.provision "file", source: "~/config.php", destination: "config.php"
end
