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
		$per_page = 10;
		$paged = $this->get_pagenum();

		$args = array(
			'number' => $per_page,
			'offset' => ( $paged-1 ) * $per_page,
			'search' => $search,
			'posts_per_page' => -1,
			'post_status' => 'any',
			'post_type' => self::post_type
		);

		if ( '' !== $args['search'] )
			$args['search'] = '*' . $args['search'] . '*';

		if ( isset( $_REQUEST['orderby'] ) )
			$args['orderby'] = $_REQUEST['orderby'];

		if ( isset( $_REQUEST['order'] ) )
			$args['order'] = $_REQUEST['order'];

		$template_query = new WP_Query( $args );
		$items = array();
		foreach ($template_query->posts as $item) {
			$items[] = $item;
		}
		$this->items = $items;

		$this->set_pagination_args( array(
			'total_items' => $template_query->post_count,
			'per_page' => $per_page,
		) );
	}

	public function get_bulk_actions()
	{
		$actions = array(
			'delete' => __( 'Delete', 'wpbtpls' )
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

	public function get_columns() {
		$c = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title', 'wpbtpls' ),
			'shortcode' => __( 'Shortcode' ),
			'author' => __( 'Author' )
		);
		return $c;
	}

	public function column_default( $item, $column_name ) {
		return 'aa';
	}

	public function column_cb( $item )
	{
		return sprintf( '<input type="checkbox" name="%1_checkbox$s" value="%2$s" />', $this->_args['singular'], $item->ID );
	}

	public function column_title( $item )
	{
		$return = '';
		$return .= '';
		return 'aab';
	}

	public function column_shortcode( $item )
	{
		return 'aav';
	}

	public function column_author( $item )
	{
		return 'aav';
	}

}