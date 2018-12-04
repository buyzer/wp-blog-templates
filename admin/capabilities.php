<?php
// Add custom capabilities
function wpbtpls_capabilities() {
	$roles = array( 'administrator', 'editor' );
	foreach ( $roles as $role ) {
		$wp_role = get_role( $role );
		$wp_role->add_cap( 'wpbtpls_manage_blog_templates' );
		$wp_role->add_cap( 'wpbtpls_read_write_blog_template' );
		$wp_role->add_cap( 'wpbtpls_delete_blog_template' );
	}
}
add_action( 'init', 'wpbtpls_capabilities', 11 );