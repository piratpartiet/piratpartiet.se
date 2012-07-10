(function ( $, m ) {

	m.addTest( 'cssvwunit', function () {

		var div = document.createElement( 'div' );
		try {
			div.style.fontSize = '3vw';
		} catch ( er ) {
		}
		return /vw/.test( div.style.fontSize )

	} );

	var libs = '/wp-content/themes/piratpartiet.se/js/libs/';

	// Fix z-index issue with youtube iframes
	$( 'iframe' ).each( function () {
		var url = $( this ).attr( 'src' );
		$( this ).attr( 'src', url + "?wmode=transparent" );
	} );

	// Polyfill for older browsers without placeholder support
	m.load( {
		test:m.input.placeholder,
		nope:libs + 'jquery.placeholder.min.js',
		callback:function () {
			$( "input[placeholder]" ).placeholder();
		}
	} );

	m.load( {
		test:$( "html" ).hasClass( 'ie8' ) || $( "html" ).hasClass( 'ie7' ),
		yep:[ libs + 'nwmatcher-1.2.5.min.js', libs + 'selectivizr-min.js']
	} );

	$( '#header .sub-menu .sub-menu' ).each( function () {
		var $this = $( this );
		$this.css( 'marginLeft', $this.parent().outerWidth() );
	} );

})( jQuery, Modernizr );
