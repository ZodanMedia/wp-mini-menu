/*
 * WP Mini menu scripts
 *
 */

'use strict';

(function($) {
	// Give the edit link a title
	$('#admin-z-mini-menu .btn-edit-post-link').attr('title', 'Edit');
	
	// Open and collapse the items
	$('#expand-z-mini-menu').click(function(e){
		e.preventDefault();
		$('#admin-z-mini-menu').addClass('open');
	});
	$('#collapse-z-mini-menu').click(function(e){
		e.preventDefault();
		$('#admin-z-mini-menu').removeClass('open');
	});
})(jQuery);
