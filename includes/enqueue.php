<?php
// Load frontend js & css files 
function wpbtpls_enqueue_scripts() {
	$suffix = '.min';
	if( defined( 'WP_DEBUG' ) && WP_DEBUG == true ){
		$suffix = '';
	}
	// Load css
	wp_enqueue_style( 'wpbtpls-main', WPBTPLS_PLUGIN_URL.'dist/css/main'. $suffix .'.css', array(), WPBTPLS_VERSION );
	wp_enqueue_style( 'wpbtpls-responsive', WPBTPLS_PLUGIN_URL.'dist/css/responsive'. $suffix .'.css', array(), WPBTPLS_VERSION );

	// Load js
	wp_enqueue_script( 'wpbtpls-main-js', WPBTPLS_PLUGIN_URL.'dist/js/main'. $suffix .'.js', array( 'jquery' ), WPBTPLS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'wpbtpls_enqueue_scripts' );