/**
 * Plugin Name: Z Mini Admin Menu
 * Admin scripts for user-edit.php / profile.php
 * 
 * Author: Zodan
 * Author URI: https://zodan.nl
 */
(function ($) {
    'use strict';

    /*
     * On a user settings page, move the WP user preference settings underneath
     * the 'show admin bar' settings
     *
     */
    if ( $('#z-mini-admin-personal-settings').length ) {
        let z_mini_admin_personal_settings_rows = $('.z-mini-admin-personal-settings-item');
        let z_wp_toolbar_row = $('tr.show-admin-bar.user-admin-bar-front-wrap');
        $( z_mini_admin_personal_settings_rows ).insertAfter( $( z_wp_toolbar_row ) );
        $('#z-mini-admin-personal-settings').remove();
    }



    

    // Add Color Picker  in admin to all inputs that have 'z-mini-menu-color-field' class
    $('.z-mini-menu-color-field').wpColorPicker();

    // Dynamically add custom menu items
    var ia_next_row;
    ia_next_row = parseInt($('.z-mini-menu-btn-add-ia').attr('data-last')) + 1;

    $('.z-mini-menu-btn-add-ia').click(function (e) {
        e.preventDefault();

        var html = '<div class="z-mini-menu-ia-item" data-id="' + ia_next_row + '"><p><label>Menu name</label><input class="regular-text" type="text" id="use_custom[' + ia_next_row + '][name]" name="z_mini_menu_plugin_options[use_custom][' + ia_next_row + '][name]"></p><p><label>Menu url</label><input class="regular-text" type="text" id="use_custom[' + ia_next_row + '][url]" name="z_mini_menu_plugin_options[use_custom][' + ia_next_row + '][url]"></p><p><label>Menu icon</label><span class="input-box"><span id="use_custom[' + ia_next_row + '][icon]_icon" class="picked-icon dashicons dashicons-heart"></span><input class="regular-text" type="hidden" id="use_custom[' + ia_next_row + '][icon]" name="z_mini_menu_plugin_options[use_custom][' + ia_next_row + '][icon]" value="dashicons-heart"><input type="button" data-target="#use_custom\\[' + ia_next_row + '\\]\\[icon\\]" data-icon="#use_custom\\[' + ia_next_row + '\\]\\[icon\\]_icon" class="button dashicons-picker" value="..."></span></p><p><label>Restricted to</label><select class="role-select" name="z_mini_menu_plugin_options[use_custom][' + ia_next_row + '][role]"></select></p><div class="z-mini-menu-btn-remove-ia">-</div></div>';
		
        $(this).before(html);

        $('.z-mini-menu-ia-item[data-id=' + ia_next_row + '] .dashicons-picker').dashiconsPicker();
		var role_select_options = $('#z-mini-menu-dummy-options').html();
        $('.z-mini-menu-ia-item[data-id=' + ia_next_row + '] .role-select').html(role_select_options);

        ia_next_row++;
    });

    // Remove custom menu items
    $(document).on('click', '.z-mini-menu-btn-remove-ia', function (e) {
        e.preventDefault();
        $(this).parent().remove();
    });

})(jQuery);


/**
 * Dashicons Picker
 *
 * Based on: https://github.com/bradvin/dashicons-picker/
 */

(function ($) {
    'use strict';
    /**
     *
     * @returns {void}
     */
    $.fn.dashiconsPicker = function () {

        /**
         * Dashicons, in CSS order
         *
         * @type Array
         */
        var icons = [
            'menu',
            'admin-site',
            'dashboard',
            'admin-media',
            'admin-page',
            'admin-comments',
            'admin-appearance',
            'admin-plugins',
            'admin-users',
            'admin-tools',
            'admin-settings',
            'admin-network',
            'admin-generic',
            'admin-home',
            'admin-collapse',
            'filter',
            'admin-customizer',
            'admin-multisite',
            'admin-links',
            'format-links',
            'admin-post',
            'format-standard',
            'format-image',
            'format-gallery',
            'format-audio',
            'format-video',
            'format-chat',
            'format-status',
            'format-aside',
            'format-quote',
            'welcome-write-blog',
            'welcome-edit-page',
            'welcome-add-page',
            'welcome-view-site',
            'welcome-widgets-menus',
            'welcome-comments',
            'welcome-learn-more',
            'image-crop',
            'image-rotate',
            'image-rotate-left',
            'image-rotate-right',
            'image-flip-vertical',
            'image-flip-horizontal',
            'image-filter',
            'undo',
            'redo',
            'editor-bold',
            'editor-italic',
            'editor-ul',
            'editor-ol',
            'editor-quote',
            'editor-alignleft',
            'editor-aligncenter',
            'editor-alignright',
            'editor-insertmore',
            'editor-spellcheck',
            'editor-distractionfree',
            'editor-expand',
            'editor-contract',
            'editor-kitchensink',
            'editor-underline',
            'editor-justify',
            'editor-textcolor',
            'editor-paste-word',
            'editor-paste-text',
            'editor-removeformatting',
            'editor-video',
            'editor-customchar',
            'editor-outdent',
            'editor-indent',
            'editor-help',
            'editor-strikethrough',
            'editor-unlink',
            'editor-rtl',
            'editor-break',
            'editor-code',
            'editor-paragraph',
            'editor-table',
            'align-left',
            'align-right',
            'align-center',
            'align-none',
            'lock',
            'unlock',
            'calendar',
            'calendar-alt',
            'visibility',
            'hidden',
            'post-status',
            'edit',
            'post-trash',
            'trash',
            'sticky',
            'external',
            'arrow-up',
            'arrow-down',
            'arrow-left',
            'arrow-right',
            'arrow-up-alt',
            'arrow-down-alt',
            'arrow-left-alt',
            'arrow-right-alt',
            'arrow-up-alt2',
            'arrow-down-alt2',
            'arrow-left-alt2',
            'arrow-right-alt2',
            'leftright',
            'sort',
            'randomize',
            'list-view',
            'excerpt-view',
            'grid-view',
            'hammer',
            'art',
            'migrate',
            'performance',
            'universal-access',
            'universal-access-alt',
            'tickets',
            'nametag',
            'clipboard',
            'heart',
            'megaphone',
            'schedule',
            'wordpress',
            'wordpress-alt',
            'pressthis',
            'update',
            'screenoptions',
            'cart',
            'feedback',
            'cloud',
            'translation',
            'tag',
            'category',
            'archive',
            'tagcloud',
            'text',
            'media-archive',
            'media-audio',
            'media-code',
            'media-default',
            'media-document',
            'media-interactive',
            'media-spreadsheet',
            'media-text',
            'media-video',
            'playlist-audio',
            'playlist-video',
            'controls-play',
            'controls-pause',
            'controls-forward',
            'controls-skipforward',
            'controls-back',
            'controls-skipback',
            'controls-repeat',
            'controls-volumeon',
            'controls-volumeoff',
            'yes',
            'no',
            'no-alt',
            'plus',
            'plus-alt',
            'plus-alt2',
            'minus',
            'dismiss',
            'marker',
            'star-filled',
            'star-half',
            'star-empty',
            'flag',
            'info',
            'warning',
            'share',
            'share1',
            'share-alt',
            'share-alt2',
            'twitter',
            'rss',
            'email',
            'email-alt',
            'facebook',
            'facebook-alt',
            'networking',
            'googleplus',
            'location',
            'location-alt',
            'camera',
            'images-alt',
            'images-alt2',
            'video-alt',
            'video-alt2',
            'video-alt3',
            'vault',
            'shield',
            'shield-alt',
            'sos',
            'search',
            'slides',
            'analytics',
            'chart-pie',
            'chart-bar',
            'chart-line',
            'chart-area',
            'groups',
            'businessman',
            'id',
            'id-alt',
            'products',
            'awards',
            'forms',
            'testimonial',
            'portfolio',
            'book',
            'book-alt',
            'download',
            'upload',
            'backup',
            'clock',
            'lightbulb',
            'microphone',
            'desktop',
            'tablet',
            'smartphone',
            'phone',
            'smiley',
            'index-card',
            'carrot',
            'building',
            'store',
            'album',
            'palmtree',
            'tickets-alt',
            'money',
            'thumbs-up',
            'thumbs-down',
            'layout',
            'align-pull-left',
            'align-pull-right',
            'block-default',
            'cloud-saved',
            'cloud-upload',
            'columns',
            'cover-image',
            'embed-audio',
            'embed-generic',
            'embed-photo',
            'embed-post',
            'embed-video',
            'exit',
            'html',
            'info-outline',
            'insert-after',
            'insert-before',
            'insert',
            'remove',
            'shortcode',
            'table-col-after',
            'table-col-before',
            'table-col-delete',
            'saved',
            'amazon',
            'google',
            'linkedin',
            'pinterest',
            'podio',
            'reddit',
            'spotify',
            'twitch',
            'whatsapp',
            'xing',
            'youtube',
            'database-add',
            'database-export',
            'database-import',
            'database-remove',
            'database-view',
            'database',
            'bell',
            'airplane',
            'car',
            'calculator',
            'games',
            'printer',
            'beer',
            'coffee',
            'drumstick',
            'food',
            'bank',
            'hourglass',
            'money-alt',
            'open-folder',
            'pdf',
            'pets',
            'privacy',
            'superhero',
            'superhero-alt',
            'edit-page',
            'fullscreen-alt',
            'fullscreen-exit-alt'
        ];

        return this.each(function () {

            var button = $(this),
                offsetTop,
                offsetLeft;

            button.on('click.dashiconsPicker', function (e) {
                offsetTop = $(e.currentTarget).offset().top;
                offsetLeft = $(e.currentTarget).offset().left;
                createPopup(button);
            });

            function createPopup(button) {

                var target = $(button.data('target')),
                    icon = $(button.data('icon')),
                    preview = $(button.data('preview')),
                    popup = $('<div class="dashicon-picker-container">'
                        + '<div class="dashicon-picker-control"></div>'
                        + '<ul class="dashicon-picker-list"></ul>'
                        + '</div>').css({
                        'top': offsetTop,
                        'left': offsetLeft
                    }),
                    list = popup.find('.dashicon-picker-list');

                for (var i in icons) {
                    if (icons.hasOwnProperty(i)) {
                        list.append('<li data-icon="' + icons[i] + '"><a href="#" title="' + icons[i] + '"><span class="dashicons dashicons-' + icons[i] + '"></span></a></li>');
                    }
                }

                $('a', list).on('click', function (e) {
                    e.preventDefault();
                    var title = $(this).attr('title');
                    target.val('dashicons-' + title);
                    icon.removeClass().addClass('picked-icon dashicons dashicons-' + title);
                    preview
                        .prop('class', 'dashicons')
                        .addClass('dashicons-' + title);
                    removePopup();
                });

                var control = popup.find('.dashicon-picker-control');

                control.html('<a data-direction="back" href="#">'
                    + '<span class="dashicons dashicons-arrow-left-alt2"></span></a>'
                    + '<input type="text" class="" placeholder="Search" />'
                    + '<a data-direction="forward" href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>'
                );

                $('a', control).on('click', function (e) {
                    e.preventDefault();
                    if ($(this).data('direction') === 'back') {
                        $('li:gt(' + (icons.length - 26) + ')', list).prependTo(list);
                    } else {
                        $('li:lt(25)', list).appendTo(list);
                    }
                });

                popup.appendTo('body').show();

                $('input', control).on('keyup', function (e) {
                    var search = $(this).val();
                    if (search === '') {
                        $('li:lt(25)', list).show();
                    } else {
                        $('li', list).each(function () {
                            if ($(this).data('icon').toLowerCase().indexOf(search.toLowerCase()) !== -1) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    }
                });

                $(document).on('mouseup.dashicons-picker', function (e) {
                    if (!popup.is(e.target) && popup.has(e.target).length === 0) {
                        removePopup();
                    }
                });
            }

            function removePopup() {
                $('.dashicon-picker-container').remove();
                $(document).off('.dashicons-picker');
            }
        });
    };

    $(function () {
        $('.dashicons-picker').dashiconsPicker();
    });
	
	$('#mini-menu-sorts').sortable({
		'items' : '.z-mini-menu-sort-item',
		'opacity' : 0.6,
		'cursor' : 'move',
		axis : 'y',
		update: function(e, ui) {
			$(this).find('.z-mini-menu-sort-item').each(function() {
				$(this).find('input').attr('name', 'z_mini_menu_plugin_order['+ $(this).index() +']');
			});
		}
	});

}(jQuery));