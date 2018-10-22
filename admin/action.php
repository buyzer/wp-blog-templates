<?php
// Action add template
function wpbtpls_add_template(){
	// Check nonce
	if ( !wp_verify_nonce( $_POST['_wpnonce'], 'wpbtpls-add-template' ) ) {
		return false;
	}

	// Check user capability
	if ( !current_user_can('wpbtpls_read_write_blog_template') ) {
		return false;
	}

	$title = sanitize_title( $_POST['title'] );  
	$category = (int)sanitize_text_field( $_POST['category'] );  
	$post_tag = (int)sanitize_text_field( $_POST['post_tag'] );  
	$posts_per_page = (int)sanitize_text_field( $_POST['posts_per_page'] );  
	$order_by = sanitize_text_field( $_POST['order_by'] );  
	$sort_order = sanitize_text_field( $_POST['sort_order'] );  
	$navigation = sanitize_text_field( $_POST['navigation'] );  
	$items_on_load = (int)sanitize_text_field( $_POST['items_on_load'] );  
	$layout = sanitize_text_field( $_POST['layout'] );  
	$wrapper_class = sanitize_text_field( $_POST['wrapper_class'] );  
	$wrapper_id = sanitize_text_field( $_POST['wrapper_id'] );  
	$item_class = sanitize_text_field( $_POST['item_class'] );  

	$blog_template = wp_insert_post( array(
		'post_title' => $title,
		'post_type' => 'wpbtpls_template' ,
		'post_status' => 'publish'
	), true );
	if ( is_wp_error($blog_template) ){
		echo $blog_template->get_error_message();
		die;
	}

	$default_attrs 	= WPBTPLS_Layout::default_attrs();
	$attrs 	= array_merge( $default_attrs, array(
		'category' => $category,
		'post_tag' => $post_tag,
		'posts_per_page' => $posts_per_page,
		'order_by' => $order_by,
		'sort_order' => $sort_order,
		'navigation' => $navigation,
		'items_on_load' => $items_on_load,
		'layout' => $layout,
		'wrapper_class' => $wrapper_class,
		'wrapper_id' => $wrapper_id,
		'item_class' => $item_class
	) );
	update_post_meta( $blog_template, '_wpbtpls_attrs', $attrs );

	$redirect_url = add_query_arg( array(
		'page' => 'wpbtpls',
		'post' => $blog_template,
		'action' => 'edit',
		'message' => 'saved'
	), admin_url( 'admin.php' ) );

	wp_redirect( $redirect_url );
	exit();
}

// Action edit template
function wpbtpls_edit_template(){
	// Check nonce
	$post_id = (int)sanitize_text_field( $_POST['post_id'] );
	if ( !wp_verify_nonce( $_POST['_wpnonce'], 'wpbtpls-edit-template-'. $post_id ) ) {
		return false;
	}

	// Check user capability
	if ( !current_user_can('wpbtpls_read_write_blog_template') ) {
		return false;
	}

	$title = sanitize_title( $_POST['title'] );  
	$category = (int)sanitize_text_field( $_POST['category'] );  
	$post_tag = (int)sanitize_text_field( $_POST['post_tag'] );  
	$posts_per_page = (int)sanitize_text_field( $_POST['posts_per_page'] );  
	$order_by = sanitize_text_field( $_POST['order_by'] );  
	$sort_order = sanitize_text_field( $_POST['sort_order'] );  
	$navigation = sanitize_text_field( $_POST['navigation'] );  
	$items_on_load = (int)sanitize_text_field( $_POST['items_on_load'] );  
	$layout = sanitize_text_field( $_POST['layout'] );  
	$wrapper_class = sanitize_text_field( $_POST['wrapper_class'] );  
	$wrapper_id = sanitize_text_field( $_POST['wrapper_id'] );  
	$item_class = sanitize_text_field( $_POST['item_class'] );  

	$blog_template = wp_update_post( array(
		'ID' => $post_id,
		'post_title' => $title
	), true );
	if ( is_wp_error($blog_template) ){
		echo $blog_template->get_error_message();
		die;
	}

	$default_attrs 	= WPBTPLS_Layout::default_attrs();
	$attrs 	= array_merge( $default_attrs, array(
		'category' => $category,
		'post_tag' => $post_tag,
		'posts_per_page' => $posts_per_page,
		'order_by' => $order_by,
		'sort_order' => $sort_order,
		'navigation' => $navigation,
		'items_on_load' => $items_on_load,
		'layout' => $layout,
		'wrapper_class' => $wrapper_class,
		'wrapper_id' => $wrapper_id,
		'item_class' => $item_class
	) );
	update_post_meta( $post_id, '_wpbtpls_attrs', $attrs );

	$redirect_url = add_query_arg( array(
		'page' => 'wpbtpls',
		'post' => $blog_template,
		'action' => 'edit',
		'message' => 'updated'
	), admin_url( 'admin.php' ) );

	wp_redirect( $redirect_url );
	exit();
}

function wpbtpls_action_init(){
	if ( !isset($_REQUEST['action']) ) {
		return false;
	}

	if ( wpbtpls_action_is( 'add_template' ) ){
		wpbtpls_add_template();
	}

	if ( wpbtpls_action_is( 'edit_template' ) ){
		wpbtpls_edit_template();
	}
}
add_action( 'init', 'wpbtpls_action_init' );

// Set message after add / edit template
function wpbtpls_action_messages(){
	if ( ! isset($_REQUEST['message']) ) {
		return false;
	}
	$msg = '';
	if ( $_REQUEST['message'] == 'saved' ){
		$msg = '<div id="message" class="updated notice notice-success is-dismissible">';
		$msg .= '<p>'. __( 'Blog Template saved.', 'wpbtpls' ) .'</p>';
		$msg .= '<button type="button" class="notice-dismiss"><span class="screen-reader-text">'.__( 'Dismiss this notice.', 'wpbtpls' ).'</span></button>';
		$msg .= '</div>';
	}
	if ( $_REQUEST['message'] == 'updated' ){
		$msg = '<div id="message" class="updated notice notice-success is-dismissible">';
		$msg .= '<p>'. __( 'Blog Template updated.', 'wpbtpls' ) .'</p>';
		$msg .= '<button type="button" class="notice-dismiss"><span class="screen-reader-text">'.__( 'Dismiss this notice.', 'wpbtpls' ).'</span></button>';
		$msg .= '</div>';
	}
	echo $msg;
}
add_action( 'wpbtpls_messages', 'wpbtpls_action_messages');