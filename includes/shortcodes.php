<?php

function wpbtpls_sc_wpbtpls( $atts ) {
	$atts = shortcode_atts( array(
		'id' => 0
	), $atts );

	$post = get_post( $atts['id'] );
	if( $post == null || $post->post_type != 'wpbtpls_template' )
		return false;

	$blog_attrs = get_post_meta( $post->ID, '_wpbtpls_attrs', true );
	$default_attrs = WPBTPLS_Layout::default_attrs();
	$blog_attrs = array_merge( $default_attrs, (array)$blog_attrs );
	
	$blog_args = array(
		'post_type' => 'post',
		'paged' => get_query_var( 'paged' ),
		'posts_per_page' => $blog_attrs['posts_per_page'],
		'orderby' => $blog_attrs['order_by'],
		'order' => strtoupper( $blog_attrs['sort_order'] ),
	);

	if( $blog_attrs['category'] != '' ) {
		$blog_args['cat'] = $blog_attrs['category'];
	}

	if( $blog_attrs['post_tag'] != '' ) {
		$blog_args['tag_id'] = $blog_attrs['post_tag'];
	}

	$blog_query = new WP_Query( $blog_args );
	$blog_id = $blog_attrs['wrapper_id'];
	$blog_class = 'wpbtpls_loop layout-'. $blog_attrs['layout'];
	$blog_class .= ' '.$blog_attrs['wrapper_class'];
	ob_start();
	echo '<div id="'.$blog_id.'" class="'.$blog_class.'">';
	if ( $blog_query->have_posts() ) :

		$item_data['blog_attrs'] = $blog_attrs;
		while ( $blog_query->have_posts() ) : $blog_query->the_post();
			wpbtpls_get_view( 'layouts/' . $blog_attrs['layout'] . '.php', $item_data );
		endwhile;

		switch ( $blog_attrs['navigation'] ) {
			case 'pagination':
				# code...
				break;
			case 'loadmore':
				# code...
				break;
		}
	endif;
	echo '</div>'; // End of .wpbtpls_loop
	return ob_get_clean();
}
add_shortcode( 'wpbtpls', 'wpbtpls_sc_wpbtpls' );