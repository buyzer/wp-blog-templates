<?php
// Add admin menu
function wpbtpls_admin_menus(){
	add_menu_page(
		_x('WP Blog Templates', 'WP Blog Templates Menu', 'wpbtpls'),
		_x('WPB Templates', 'WP Blog Templates Menu', 'wpbtpls'),
		'manage_options',
		'wpbtpls',
		'wpbtpls_dashboard_view'
	);

	add_submenu_page( 
		'wpbtpls',
		__('Add New', 'wpbtpls'),
		__('Add New', 'wpbtpls'),
		'manage_options',
		'wpbtpls-new',
		'wpbtpls_add_template_view'
	);
}
add_action( 'admin_menu', 'wpbtpls_admin_menus' );

function wpbtpls_dashboard_view(){
	echo "string";
}

// Render add template HTML
function wpbtpls_add_template_view(){
	$data['categories'] = get_terms( 'category', array(
	'hide_empty' => false,
	) );

	$data['post_tags'] = get_terms( 'post_tag', array(
		'hide_empty' => false,
	) );
	wpbtpls_get_view( 'admin/add-new.php', $data );
}

// Action add template
function wpbtpls_add_template(){
	if( !wp_verify_nonce( $_POST['_wpnonce'], 'wpbtpls-add-template' ) ){
		return false;
	}
	
}
add_action( 'admin_post_add_template', 'wpbtpls_add_template' );
