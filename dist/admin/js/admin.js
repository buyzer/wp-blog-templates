( function ( $ ) {
	'use strict';

	$( document ).ready( function () {
		// Registering Jquery-ui tabs
		$( '.wpbtpls-tabs' ).tabs();

		$( '#wpbtpls-form select[name="navigation"]' ).on( 'change', function () {
			var value = $( this ).val();
			if ( value == 'loadmore' ) {
				$( '#wpbtpls-form .items-on-load' ).show();
			} else {
				$( '#wpbtpls-form .items-on-load' ).hide();
			}
		} );
		$( '#wpbtpls-form select[name="navigation"]' ).trigger( 'change' )

	} );

} )( jQuery );
