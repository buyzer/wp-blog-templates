<?php
// Add admin menu
function wpbtpls_admin_menus() {
	add_menu_page(
		_x('WP Blog Templates', 'WP Blog Templates Menu', 'wpbtpls'),
		_x('WPB Templates', 'WP Blog Templates Menu', 'wpbtpls'),
		'wpbtpls_manage_blog_templates',
		'wpbtpls',
		'wpbtpls_dashboard_view'
	);

	add_submenu_page( 
		'wpbtpls',
		__('Add Blog Template', 'wpbtpls'),
		__('Add Blog Template', 'wpbtpls'),
		'wpbtpls_manage_blog_templates',
		'wpbtpls-new',
		'wpbtpls_add_template_view'
	);
}
add_action( 'admin_menu', 'wpbtpls_admin_menus' );

// Render dashboard view
function wpbtpls_dashboard_view() {
	$post_id = isset($_GET['post']) ? (int)sanitize_text_field( $_GET['post'] ) : 0;
	$post = get_post( $post_id );
	// Render edit template view
	if ( wpbtpls_action_is( 'edit' ) && $post != null && $post->post_type == 'wpbtpls_template' ) {
		$data['categories'] = get_terms( 'category', array(
		'hide_empty' => false
		) );
		$data['post_tags'] = get_terms( 'post_tag', array(
			'hide_empty' => false
		) );
		$data['blog_template'] = $post;
		$data['blog_template_attrs'] = get_post_meta( $post_id, '_wpbtpls_attrs', true );
		wpbtpls_get_view( 'admin/edit.php', $data );
	} else {
		$data['table_list'] = new WPBTPLS_Blog_Templates_Table();
		wpbtpls_get_view( 'admin/dashboard.php', $data );
	}
}

// Render add template view
function wpbtpls_add_template_view() {
	$data['categories'] = get_terms( 'category', array(
	'hide_empty' => false,
	) );
	$data['post_tags'] = get_terms( 'post_tag', array(
		'hide_empty' => false,
	) );
	wpbtpls_get_view( 'admin/add-new.php', $data );
}


