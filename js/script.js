(function($,m) {

	// Fix z-index issue with youtube iframes
	$('iframe').each(function() {
		var url = $(this).attr('src');
		$(this).attr('src', url + "?wmode=transparent");
	});

	// Polyfill for older browsers without placeholder support
	m.load({
		test: m.input.placeholder,
		nope: '/wp-content/themes/piratpartiet.se/js/libs/jquery.placeholder.min.js',
		callback: function() {
			$("input[placeholder]").placeholder();
		}
	});

	m.load({
		test: $("html").hasClass('ie8') || $("html").hasClass('ie7'),
		yep: [ '/wp-content/themes/piratpartiet.se/js/libs/nwmatcher-1.2.5.js', '/wp-content/themes/piratpartiet.se/js/libs/selectivizr-min.js'],
		callback: function() {
			alert('ie 7-8');
		}
	});

})(jQuery, Modernizr);
