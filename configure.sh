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
