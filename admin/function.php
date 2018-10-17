<?php

function wpbtpls_admin_menu(){
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
		'wpbtpls_add_new_view'
	);
}
add_action( 'admin_menu', 'wpbtpls_admin_menu' );

function wpbtpls_dashboard_view(){
	echo "string";
}

//Add New Template
function wpbtpls_add_new_view(){
	$data['aa'] = 'xx';
	wpbtpls_get_view( 'admin/add-new.php', $data );
}