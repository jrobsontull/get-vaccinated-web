function navigate(nav_to_bar, to_nav) {
	to_nav_to_bar = $(nav_to_bar);

	current_display_blk = $(".options-display").children().each(function () {
		if ($(this).css('display') == "block") {
			return $(this);
		}
	});
	
	// Naviagte
	current_display_blk.fadeOut(function() {
		to_nav_to.fadeIn();
		current_display_blk.removeClass('selected');
		to_nav_to.addClass('selected');
	});
}