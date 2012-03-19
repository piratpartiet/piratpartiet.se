(function($) {
	$(document).ready(function() {
		$("form#post").submit(function() {

			if ( $("#remove-post-thumbnail").length == 0 ) {

				$("#publishing-action .button-primary").removeClass('button-primary-disabled');
				$("#ajax-loading").css('visibility', 'hidden');

				alert("Du måste välja utvald bild innan du kan publicera eller uppdatera!");

				return false;
			}
		});
	})
})(jQuery);
