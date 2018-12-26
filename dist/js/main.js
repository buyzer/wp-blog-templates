(function($){
	"use strict";
	console.log('test')

	// forcing equal height of Standart 2 layout
	wpbtpls_equal_height( $( '.layout-standart2 .wpbtpls-item-class' ) );

	function wpbtpls_equal_height( $item, $minwidth ) {
		var widthScreen = $(window).width();
		$minwidth = typeof $minwidth == 'undefined' ? 768 : $minwidth;
		if( $item.length > 0  && widthScreen >= $minwidth ) {
			var m_group_h = Math.max.apply(null, $item.map(function ()
			{
				return $(this).outerHeight();
			}).get());
			$item.css('height' , m_group_h+'px');
		}
	}
})(jQuery)