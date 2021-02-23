'use strict';
(function($) {
	$('#admin-z-mini-menu .btn-edit-post-link').attr('title', 'Edit');
	$( document ).on( "click", "#expand-z-mini-menu", function(e) {
		e.preventDefault();
		$('#admin-z-mini-menu').addClass('open');
	});
	$( document ).on( "click", "#collapse-z-mini-menu", function(e) {
		e.preventDefault();
		$('#admin-z-mini-menu').removeClass('open');
	});
})(jQuery);
