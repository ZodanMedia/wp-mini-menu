/**
 * Plugin Name: Z Mini Admin Menu
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 * Description: A mini menu to access most common admin items when te admin bar is not active
 * Version: 0.0.7
 * Author: Zodan
 * Author URI: https://zodan.nl
 * License: GPL2
 */

(function ($) {
    'use strict';
    $('#admin-z-mini-menu .btn-edit-post-link').attr('title', 'Edit');
    $(document).on("click", "#expand-z-mini-menu", function (e) {
        e.preventDefault();
        $('#admin-z-mini-menu').addClass('open');
    });
    $(document).on("click", "#collapse-z-mini-menu", function (e) {
        e.preventDefault();
        $('#admin-z-mini-menu').removeClass('open');
    });
})(jQuery);
