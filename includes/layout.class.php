<?php
/**
 * Layout Class
 */
class WPBTPLS_Layout
{
	
	function __construct()
	{
		# code...
	}

	public function render()
	{
		
	}

	public static function layouts()
	{
		$layouts = array (
			'standart1' => array (
				'title' => _x( 'Standart 1', 'Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart1.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
			'standart2' => array (
				'title' => _x( 'Standart 2', 'Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart2.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
			'standart3' => array (
				'title' => _x( 'Standart 3', 'Layout Name', 'wpbtpls'),
				'thumbnail' => WPBTPLS_PLUGIN_URL . 'dist/admin/images/layout/standart3.svg',
				'supports' => array ( 'title' ,'thumbnail', 'excerpt', 'author', 'date', 'label' )
			),
		);
		return $layouts;
	}
}