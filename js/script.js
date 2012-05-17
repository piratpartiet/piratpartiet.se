
// Fix z-index issue with youtube iframes
jQuery('iframe').each(function() {
	var url = jQuery(this).attr('src');
	jQuery(this).attr('src', url + "?wmode=transparent");
});

// Polyfill for older browsers without placeholder support
Modernizr.load({
	test: Modernizr.input.placeholder,
	nope: '/wp-content/themes/piratpartiet.se/js/libs/jquery.placeholder.min.js',
	complete: function() {
		jQuery("input[placeholder]").placeholder();
	}
});