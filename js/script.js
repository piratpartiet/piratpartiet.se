
// Fix z-index issue with youtube iframes
jQuery('iframe').each(function() {
	var url = jQuery(this).attr('src');
	jQuery(this).attr('src', url + "?wmode=transparent");
});