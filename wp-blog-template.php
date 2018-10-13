<?php
/*
Plugin Name:  WP Blog Template
Plugin URI:   
Description:  Easily build your own layout for News / Portfolio / Blog / Archives page.
Version:      0.0.1
Author:       Buyung Abadi
Author URI:   https://profiles.wordpress.org/buyzer
License:      GPL2
Text Domain:  wpbtpl
Domain Path:  /languages
*/

if(! defined('ABSPATH')){
	die('');
}

//Set the version of this plugin
define('WPBTPL_VERSION', '0.0.1');

//Set the minimum Wordpress version
define('WPBTPL_MIN_WP_VERSION', '4.1.0');

//Set the minimum PHP version
define('WPBTPL_MIN_PHP_VERSION', '5.6');

//Set the plugin url
define('WPBTPL_PLUGIN_URL', plugins_url( '/', __FILE__ ));

//Set the plugin directory path
define('WPBTPL_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__ ));

//Include loader file
include_once( WPBTPL_PLUGIN_DIRECTORY . 'includes/loader.php' );

//Include admin loader file
if(is_admin()){
	include_once( WPBTPL_PLUGIN_DIRECTORY . 'admin/loader.php' );
}
