<?php

function wpbtpls_init(){

}
add_action('plugins_loaded', 'wpbtpls_init');

function wpbtpls_install(){
	//trigger functions that register custom post type
	wpbtpls_register_post_type();

	//clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}	

//get template
function wpbtpls_get_view($file, $data = []){
	extract($data);
	include_once( WPBTPLS_PLUGIN_DIRECTORY.'views/' . $file );
}