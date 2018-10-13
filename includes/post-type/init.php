<?php
//registering custom post type
function wpbtpl_register_post_type(){
	
	//blog template CPT
	$blog_template_cpt 	= 'wpbtpl_blog_template';
	$blog_template_labels = array(
		'name'                  => _x( 'Blog Templates', 'Post type general name', 'wpbtpl' ),
		'singular_name'         => _x( 'Blog Template', 'Post type singular name', 'wpbtpl' ),
		'menu_name'             => _x( 'Blog Templates', 'Admin Menu text', 'wpbtpl' ),
		'name_admin_bar'        => _x( 'Blog Template', 'Add New on Toolbar', 'wpbtpl' ),
		'add_new'               => __( 'Add New', 'wpbtpl' ),
		'add_new_item'          => __( 'Add New Blog Template', 'wpbtpl' ),
		'new_item'              => __( 'New Blog Template', 'wpbtpl' ),
		'edit_item'             => __( 'Edit Blog Template', 'wpbtpl' ),
		'view_item'             => __( 'View Blog Template', 'wpbtpl' ),
		'all_items'             => __( 'All Blog Templates', 'wpbtpl' ),
		'search_items'          => __( 'Search Blog Templates', 'wpbtpl' ),
		'parent_item_colon'     => __( 'Parent Blog Templates:', 'wpbtpl' ),
		'not_found'             => __( 'No Blog Templates found.', 'wpbtpl' ),
		'not_found_in_trash'    => __( 'No Blog Templates found in Trash.', 'wpbtpl' )
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
add_action('init', 'wpbtpl_register_post_type');