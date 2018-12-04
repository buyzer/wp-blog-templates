<?php

function wpbtpls_init() {

}
add_action('plugins_loaded', 'wpbtpls_init');

function wpbtpls_install() {
	// Trigger functions that register custom post type
	wpbtpls_register_post_type();

	// Clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}	

// Get View
function wpbtpls_get_view($file, $data = []) {
	if ( $data != null ) {
		extract($data);
	}

	if ( file_exists( WPBTPLS_PLUGIN_DIRECTORY.'views/' . $file ) ) {
		include( WPBTPLS_PLUGIN_DIRECTORY.'views/' . $file );
	}
}

// Check current action
function wpbtpls_action_is( $action_name ) {
	if( !isset($_REQUEST['action']) ) {
		return false;
	}
	return $_REQUEST['action'] == $action_name ? true : false;
}

// Custom excerpt
function wpbtpls_excerpt( $length = 55 ) {
	if( has_excerpt() )
		$excerpt = get_the_excerpt();
	else
		$excerpt = strip_tags( get_the_content() );

	$excerpt = strip_shortcodes( $excerpt );
	echo wpautop( wp_trim_words( $excerpt, $length ) );
}

// Custom read-more link
function wpbtpls_readmore( $readmore ) {
	echo sprintf( '<a href="%s" class="wpbtpls-readmore">%s</a>',
		get_permalink(),
		$readmore
	);
}

// Remove read more link
function wpbtpls_content_more_link( $more ) {
  return '';
}
add_filter( 'excerpt_more', 'wpbtpls_content_more_link', 11 );