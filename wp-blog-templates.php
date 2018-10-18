<?php
/*
Plugin Name:  WP Blog Templates
Plugin URI:   
Description:  Easily build beautiful layout for News / Blog / Post.
Version:      0.0.1
Author:       Buyung Abadi
Author URI:   https://profiles.wordpress.org/buyzer
License:      GPL2
Text Domain:  wpbtpls
Domain Path:  /languages
*/

if(! defined('ABSPATH')){
	die('');
}

//Set the version of this plugin
define('WPBTPLS_VERSION', '0.0.1');

//Set the minimum Wordpress version
define('WPBTPLS_MIN_WP_VERSION', '4.1.0');

//Set the minimum PHP version
define('WPBTPLS_MIN_PHP_VERSION', '5.6');

//Set the plugin url
define('WPBTPLS_PLUGIN_URL', plugins_url( '/', __FILE__ ));

//Set the plugin directory path
define('WPBTPLS_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__ ));

//Include loader file
include_once( WPBTPLS_PLUGIN_DIRECTORY . 'includes/loader.php' );

//Include admin loader file
if(is_admin()){
	include_once( WPBTPLS_PLUGIN_DIRECTORY . 'admin/loader.php' );
}
