<?php
// Load admin js & css files 
function wpbtpls_admin_enqueue_scripts(){
	$suffix = '.min';
	if( defined('WP_DEBUG') && WP_DEBUG == true){
		$suffix = '';
	}
	// Load css
	wp_enqueue_style( 'wpbtpls-admin', WPBTPLS_PLUGIN_URL.'dist/admin/css/admin'. $suffix .'.css', array(), WPBTPLS_VERSION );

	// Load js
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'wpbtpls-admin-js', WPBTPLS_PLUGIN_URL.'dist/admin/js/admin'. $suffix .'.js', array( 'jquery' ), WPBTPLS_VERSION, true );
}
add_action('admin_enqueue_scripts', 'wpbtpls_admin_enqueue_scripts');