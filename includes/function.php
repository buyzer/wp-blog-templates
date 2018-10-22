<?php

function wpbtpls_init(){

}
add_action('plugins_loaded', 'wpbtpls_init');

function wpbtpls_install(){
	// Trigger functions that register custom post type
	wpbtpls_register_post_type();

	// Clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}	

// Get View
function wpbtpls_get_view($file, $data = []){
	if($data != null){
		extract($data);
	}
	include_once( WPBTPLS_PLUGIN_DIRECTORY.'views/' . $file );
}

// Check current action
function wpbtpls_action_is( $action_name ){
	if(! isset($_REQUEST['action'])){
		return false;
	}
	return $_REQUEST['action'] == $action_name ? true : false;
}