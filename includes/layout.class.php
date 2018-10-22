<?php
/**
 * Layout Class
 */
class WPBTPLS_Layout
{
	
	function __construct()
	{
	}

	public function render()
	{
		
	}

	public static function layouts()
	{
		$layouts = array (
			'standart1' => array (
				'title' => _x( 'Standart 1', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart1.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
			'standart2' => array (
				'title' => _x( 'Standart 2', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart2.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
			'standart3' => array (
				'title' => _x( 'Standart 3', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart3.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
		);
		return $layouts;
	}

	public static function default_attrs()
	{
		return array(
			'category' => '',
			'post_tag' => '',
			'posts_per_page' => '',
			'order_by' => 'date',
			'sort_order' => 'desc',
			'navigation' => '',
			'items_on_load' => '',
			'layout' => '',
			'wrapper_class' => '',
			'wrapper_id' => '',
			'item_class' => ''
		);
	}

}