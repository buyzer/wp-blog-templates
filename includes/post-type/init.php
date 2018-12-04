<?php
//registering custom post type
function wpbtpls_register_post_type() {
	
	//blog template CPT
	$blog_template_cpt 	= 'wpbtpls_template';
	$blog_template_labels = array(
		'name'                  => _x( 'Blog Templates', 'Post type general name', 'wpbtpls' ),
		'singular_name'         => _x( 'Blog Template', 'Post type singular name', 'wpbtpls' ),
		'menu_name'             => _x( 'Blog Templates', 'Admin Menu text', 'wpbtpls' ),
		'name_admin_bar'        => _x( 'Blog Template', 'Add New on Toolbar', 'wpbtpls' ),
		'add_new'               => __( 'Add New', 'wpbtpls' ),
		'add_new_item'          => __( 'Add New Blog Template', 'wpbtpls' ),
		'new_item'              => __( 'New Blog Template', 'wpbtpls' ),
		'edit_item'             => __( 'Edit Blog Template', 'wpbtpls' ),
		'view_item'             => __( 'View Blog Template', 'wpbtpls' ),
		'all_items'             => __( 'All Blog Templates', 'wpbtpls' ),
		'search_items'          => __( 'Search Blog Templates', 'wpbtpls' ),
		'parent_item_colon'     => __( 'Parent Blog Templates:', 'wpbtpls' ),
		'not_found'             => __( 'No Blog Templates found.', 'wpbtpls' ),
		'not_found_in_trash'    => __( 'No Blog Templates found in Trash.', 'wpbtpls' )
	);
	$blog_template_args = array(
		'labels'             => $blog_template_labels,
		'public'             => true,
		'query_var'          => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'author' ),
	);
	register_post_type( $blog_template_cpt, $blog_template_args );
}
add_action( 'init', 'wpbtpls_register_post_type' );