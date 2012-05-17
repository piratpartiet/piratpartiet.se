
// Fix z-index issue with youtube iframes
jQuery('iframe').each(function() {
	var url = jQuery(this).attr('src');
	jQuery(this).attr('src', url + "?wmode=transparent");
});

// Polyfill for older browsers without placeholder support
Modernizr.load({
	test: Modernizr.input.placeholder,
	nope: '/wp-content/themes/piratpartiet.se/js/libs/jquery.placeholder.min.js',
	callback: function(result) {
		result || jQuery("input[placeholder]").placeholder();
	}
});

Modernizr.load({
	test: jQuery("html").hasClass('ie8') || jQuery("html").hasClass('ie7'),
	nope: '/wp-content/themes/piratpartiet.se/js/libs/selectivizr-min.js',
	callback: function(result) {

		result ? alert('not ie7-8') : alert('ie 7-8');
	}
});