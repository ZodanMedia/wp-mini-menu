'use strict';

(function($) {
	$('#admin-z-mini-menu .btn-edit-post-link').attr('title', 'Edit');
	
	$('#expand-z-mini-menu').click(function(e){
		e.preventDefault();
		$('#admin-z-mini-menu').addClass('open');
	});
	$('#collapse-z-mini-menu').click(function(e){
		e.preventDefault();
		$('#admin-z-mini-menu').removeClass('open');
	});
})(jQuery);