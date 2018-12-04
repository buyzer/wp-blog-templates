<?php
/**
 * Layout Class
 */
class WPBTPLS_Layout
{
	public static function layouts()
	{
		$layouts = array (
			'standart1' => array (
				'title' => _x( 'Standart 1', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart1.svg'
			),
			'standart2' => array (
				'title' => _x( 'Standart 2', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart2.svg'
			),
			'standart3' => array (
				'title' => _x( 'Standart 3', 'WP Blog Templates Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart3.svg'
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
			'image_size' => 'thumbnail',
			'show_date' => '1',
			'date_format' => 'F j, Y',
			'show_excerpt' => '1',
			'excerpt_length' => '55',
			'show_readmore' => '1',
			'readmore_text' => 'Read More...',
			'wrapper_class' => '',
			'wrapper_id' => '',
			'item_class' => ''
		);
	}

}