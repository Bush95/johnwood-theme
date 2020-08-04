# Johnwood - theme coding example
*Based on Bedrock (https://roots.io/bedrock/)*

* This is a website built on wordpress and woocommerce. In this project I've been using webpack to compile assets. Es6, jquery, scss and php+html have been used. That's my most recent build project (from week ago)

* Composer is used to install wordpress files and plugins.
* That's only a theme folder in this repo. The webpack, composer and package-json config files are in root directory.

## Development
The output files from js and scss are in the dist folder. This whole folder is made by webpack and shouldn't be modified.

### SCSS
Styles can be edited in scss/sass folder. style.scss is the root file. It includes other modules and it has fev styles used globally.

### JS
JavaScript can be edited in src/scripts folder. I didn't use js much in this project. It contains fev scripts to control navigation and carousels. I try to limit the use of jQuery and mainly write in pure JS. In JS I'm using simple routing, based on body class that wordpress uses.

### PHP
functions.php is the main file for php script. It only contains fev usable functions, the rest of the scripts are organized in the inc folder.