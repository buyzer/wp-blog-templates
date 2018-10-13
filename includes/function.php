<?php

function wpbtpl_init(){

}
add_action('plugins_loaded', 'wpbtpl_init');

function wpbtpl_install(){
	//trigger functions that register custom post type
	wpbtpl_register_post_type();

	//clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}	
