<?php
/**
 * Blog Templates List Tables
 */

if ( !class_exists('WP_List_Table') ){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class WPBTPLS_Blog_Templates_Table extends WP_List_Table
{
	const post_type = 'wpbtpls_template';

	function __construct()
	{
		parent::__construct( array(
			'singular'  => 'post',
			'plural'    => 'posts',
			'ajax'      => false 
		) );
	}

	public function prepare_items()
	{
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);

		$search = isset( $_REQUEST['s'] ) ? wp_unslash( trim( $_REQUEST['s'] ) ) : '';
		$per_page = 1;
		$paged = $this->get_pagenum();
		$args = array(
			'posts_per_page' => $per_page,
			'paged' => $paged,
			's' => $search,
			'post_status' => 'any',
			'post_type' => self::post_type
		);

		if ( isset( $_REQUEST['orderby'] ) )
			$args['orderby'] = $_REQUEST['orderby'];

		if ( isset( $_REQUEST['order'] ) )
			$args['order'] = $_REQUEST['order'];

		$template_query = new WP_Query( $args );
		$items = array();
		foreach ( $template_query->posts as $item ) {
			$items[] = $item;
		}
		$this->items = $items;

		$total_items = $template_query->found_posts;
		$total_pages = ceil( $total_items / $per_page );

		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'total_pages' => $total_pages,
			'per_page' => $per_page,
		) );
	}

	public function get_bulk_actions()
	{
		$actions = array(
			'bulk_delete_template' => __( 'Delete', 'wpbtpls' )
		);
		return $actions;
	}

	public function get_sortable_columns()
	{
		$columns = array(
			'title' => array( 'title', true ),
			'author' => array( 'author', false ),
		);

		return $columns;
	}

	public function get_columns()
	{
		$c = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title', 'wpbtpls' ),
			'shortcode' => __( 'Shortcode' ),
			'author' => __( 'Author' )
		);
		return $c;
	}

	public function column_default( $item, $column_name )
	{
		return '';
	}

	public function column_cb( $item )
	{
		return sprintf( '<input type="checkbox" name="%s_checkbox[]" value="%s" />', $this->_args['singular'], $item->ID );
	}

	public function column_title( $item )
	{
		$delete_nonce = wp_create_nonce( 'wpbtpls-delete-template' );
		$url = admin_url( 'admin.php?page=wpbtpls&post=' . absint( $item->ID ) );
		$edit_link = add_query_arg( array( 'action' => 'edit' ), $url );
		$delete_link = add_query_arg( array( 'action' => 'delete_template', '_wpnonce' => $delete_nonce ), $url );

		$output = sprintf(
			'<strong><a href="%s" title="%s" class="row-title">%s</a></strong>',
			esc_url( $edit_link ),
			esc_attr( __( 'Edit', 'wpbtpls' ) ),
			esc_html( $item->post_title )
		);

		$actions = [
			'edit' => sprintf( '<a href="%s">%s</a>',
				$edit_link,
				__( 'Edit', 'wpbtpls' )
			),
			'delete' => sprintf( '<a href="%s" onclick="return confirm(\'%s\')">%s</a>',
				$delete_link,
				__( 'This action will deleting Item permanently.', 'wpbtpls' ),
				__( 'Delete', 'wpbtpls' )
			)
		];

		$output .= $this->row_actions( $actions );
		return $output;
	}

	public function column_shortcode( $item )
	{
		$output = '<code>[wpbtpls id="'.$item->ID.'"]</code>';
		return $output;
	}

	public function column_author( $item )
	{
		$author = get_userdata( $item->post_author );
		return $author != null ? esc_html( $author->display_name ) : '-';
	}

}