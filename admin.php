<?php

/**
 * Settings page for WordPress mini admin menu
 *
 *
 * Author: Zodan
 * Author URI: https://zodan.nl
 * License: GPL2
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}


/*
 * 1. Define settings sections for the plugin options page
 *    a) The basic utilities like menus, widgets, plugins etc
 *    b) The built-in supported plugins like ACF, Woo, Yoast, WPML, FluentForms, GravityForms
 */
$z_mini_menu_settings_sections[ 0 ][ 'name' ] = 'main_settings';
$z_mini_menu_settings_sections[ 0 ][ 'title' ] = __('Main (built-in) menu items', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'callback' ] = 'z_mini_menu_main_section_text';
$z_mini_menu_settings_sections[ 0 ][ 'items' ] = array();

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 0 ][ 'name' ] = 'use_add_new';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 0 ][ 'title' ] = __('Add new', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 0 ][ 'label' ] = __('Include a link to add new posts/pages/customs post types (depending on user capabilities)', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 0 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 1 ][ 'name' ] = 'use_multisite';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 1 ][ 'title' ] = __('WP Network', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 1 ][ 'label' ] = __('Include a link to the Network admin', 'z-mini-admin-menu');;
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 1 ][ 'condition' ] = array( 'if_is_multisite' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 2 ][ 'name' ] = 'use_menus';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 2 ][ 'title' ] = __('Menus', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 2 ][ 'label' ] = __('Include a link to the Menus section', 'z-mini-admin-menu');;
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 2 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 3 ][ 'name' ] = 'use_widgets';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 3 ][ 'title' ] = __('Widgets', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 3 ][ 'label' ] = __('Include a link to the Widgets section', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 3 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 4 ][ 'name' ] = 'use_plugins';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 4 ][ 'title' ] = __('Plugins', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 4 ][ 'label' ] = __('Include a link to the Plugins section', 'z-mini-admin-menu');;
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 4 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 5 ][ 'name' ] = 'use_users';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 5 ][ 'title' ] = __('Users', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 5 ][ 'label' ] = __('Include a link to the WordPress Users section', 'z-mini-admin-menu');;
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 5 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 6 ][ 'name' ] = 'use_woocommerce';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 6 ][ 'title' ] = __( 'Woocommerce', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 6 ][ 'label' ] = __('Include the Woocommerce admin link', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 6 ][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'name' ] = 'use_wpseo';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'title' ] = __( 'SEO (Yoast)', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'label' ] = __('Include a link to the WP SEO (Yoast) dashboard', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'condition' ] = array( 'if_class_exists', 'WPSEO_Options' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 8 ][ 'name' ] = 'use_acf';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 8 ][ 'title' ] = __('ACF', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 8 ][ 'label' ] = __('Include a link to Advanced Custom Fields', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 8 ][ 'condition' ] = array( 'if_class_exists', 'ACF' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 9 ][ 'name' ] = 'use_wpml';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 9 ][ 'title' ] = __('WPML', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 9 ][ 'label' ] = __('Include a link to the WPML dashboard', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 9 ][ 'condition' ] = array( 'if_function_exists', 'icl_object_id' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'name' ] = 'use_woo_products';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'title' ] = __( 'Woocommerce products', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'label' ] = __('Include the Woocommerce products link', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'name' ] = 'use_fforms';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'title' ] = __('FluentForms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'label' ] = __('Include a link to FluentForms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'condition' ] = array( 'if_function_exists', 'wpFluentForm' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 12 ][ 'name' ] = 'use_gravityforms';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 12 ][ 'title' ] = __('Gravity Forms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 12 ][ 'label' ] = __('Include a link to Gravity Forms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 12 ][ 'condition' ] = array( 'if_class_exists', 'GFCommon' );






$z_mini_menu_settings_sections[ 1 ][ 'name' ] = 'custom_settings';
$z_mini_menu_settings_sections[ 1 ][ 'title' ] = __('Custom menu items', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 1 ][ 'callback' ] = 'z_mini_menu_custom_section_text';
$z_mini_menu_settings_sections[ 1 ][ 'items' ] = array();

$z_mini_menu_settings_sections[ 1 ][ 'items' ][ 0 ][ 'name' ] = 'use_custom';
$z_mini_menu_settings_sections[ 1 ][ 'items' ][ 0 ][ 'title' ] = __('Custom items', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 1 ][ 'items' ][ 0 ][ 'label' ] = '';
$z_mini_menu_settings_sections[ 1 ][ 'items' ][ 0 ][ 'condition' ] = array( 'interactive_fields' );

$z_mini_menu_settings_sections[ 2 ][ 'name' ] = 'other_settings';
$z_mini_menu_settings_sections[ 2 ][ 'title' ] = __('Other settings', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'callback' ] = 'z_mini_menu_other_section_text';
$z_mini_menu_settings_sections[ 2 ][ 'items' ] = array();

$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 0 ][ 'name' ] = 'bg_color';
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 0 ][ 'title' ] = __('Background color', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 0 ][ 'label' ] = '';
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 0 ][ 'condition' ] = array( 'use_color_picker' );

$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 1 ][ 'name' ] = 'use_after_main';
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 1 ][ 'title' ] = __('Output location', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 1 ][ 'label' ] = __('Output after main content.<br />You might want to check this if you are using a page loader like BarbaJs. Note: you need to include a "after_main" hook in your theme.<br />If <em>unchecked</em>, the menu will be placed in the footer (recommended).', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 1 ][ 'condition' ] = array( '' );

$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'name' ] = 'use_roles';
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'title' ] = __('Permitted roles', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'label' ] = __('Select roles', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'condition' ] = array( 'use_roles_permit' );




if ( !defined( 'Z_MINI_MENU_SETTINGS_SECTIONS' ) ) {
    define( 'Z_MINI_MENU_SETTINGS_SECTIONS', $z_mini_menu_settings_sections );
}




/*
 * 2. Register all settings
 *
 *
 */
if ( !function_exists( 'z_mini_menu_register_settings' ) ) {

    function z_mini_menu_register_settings() {
		
		$settings_args = array(
			'type' => 'array',
			'description' => '',
			'sanitize_callback' => 'z_mini_menu_plugin_options_validate',
			'show_in_rest' => false
		);
        register_setting( 'z_mini_menu_plugin_options', 'z_mini_menu_plugin_options', $settings_args);
		
		$order_args = array(
			'type' => 'array',
			'description' => '',
			'sanitize_callback' => 'z_mini_menu_plugin_order_validate',
			'show_in_rest' => false
		);
		register_setting( 'z_mini_menu_plugin_order', 'z_mini_menu_plugin_order', $order_args);
		
		
        // loop through all settings
        foreach ( Z_MINI_MENU_SETTINGS_SECTIONS as $section ) {
            // add section
            add_settings_section( $section[ 'name' ], $section[ 'title' ], $section[ 'callback' ], 'z_mini_menu_plugin', $section );

            // loop through the items
            foreach ( $section[ 'items' ] as $item ) {

                if ( $item[ 'condition' ][ 0 ] == 'if_class_exists' && !class_exists( $item[ 'condition' ][ 1 ] ) ) {
                    continue;
                }
                if ( $item[ 'condition' ][ 0 ] == 'if_function_exists' && !function_exists( $item[ 'condition' ][ 1 ] ) ) {
                    continue;
                }
                if ( $item[ 'condition' ][ 0 ] == 'if_is_multisite' && !is_multisite() ) {
                    continue;
                }
                if ( $item[ 'condition' ][ 0 ] == 'interactive_fields' ) {
                    add_settings_field(
                        'z_mini_menu_setting_' . $item[ 'name' ],
                        $item[ 'title' ],
                        'z_mini_menu_ia_item_display',
                        'z_mini_menu_plugin',
                        $section[ 'name' ],
                        array(
                            'item' => $item
                        )
                    );

                } elseif ( $item[ 'condition' ][ 0 ] == 'use_color_picker' ) {
                    add_settings_field(
                        'z_mini_menu_setting_' . $item[ 'name' ],
                        $item[ 'title' ],
                        'z_mini_menu_color_picker_item_display',
                        'z_mini_menu_plugin',
                        $section[ 'name' ],
                        array(
                            'item' => $item
                        )
                    );

                } elseif ( $item[ 'condition' ][ 0 ] == 'use_roles_permit' ) {
                    add_settings_field(
                        'z_mini_menu_setting_' . $item[ 'name' ],
                        $item[ 'title' ],
                        'z_mini_menu_use_roles_item_display',
                        'z_mini_menu_plugin',
                        $section[ 'name' ],
                        array(
                            'item' => $item
                        )
                    );

                } else {
                    add_settings_field(
                        'z_mini_menu_setting_' . $item[ 'name' ],
                        $item[ 'title' ],
                        'z_mini_menu_item_display',
                        'z_mini_menu_plugin',
                        $section[ 'name' ],
                        array(
                            'item' => $item
                        )
                    );
                }
            }
        }

		// add order settings
		add_settings_section( 'order_items', 'Ordering of existing menu-items', 'z_mini_menu_ordering_section_text', 'z_mini_menu_plugin_order');

    }
    add_action( 'admin_init', 'z_mini_menu_register_settings' );

}






/*
 * 3.a. Create settings pages
 *
 *
 */
if ( !function_exists( 'z_mini_menu_add_settings_page' ) ) {
	
    function z_mini_menu_add_settings_page() {
        add_options_page( 'Wordpress mini admin settings', 'WP Mini Menu', 'manage_options', 'z_mini_menu_plugin', 'z_mini_menu_render_settings_page' );
		// add_options_page( 'Ordering mini admin menu items', 'WP mini menu order', 'manage_options', 'z_mini_menu_plugin_order', 'z_mini_menu_render_settings_page' );
		
		// remove ordering from menu
		// remove_submenu_page( 'options-general.php', 'z_mini_menu_plugin_order' );
    }
	add_action( 'admin_menu', 'z_mini_menu_add_settings_page', 10 );
}



/*
 * 3.b.1. Render settings page
 *
 *
 */ 
if ( !function_exists( 'z_mini_menu_render_settings_page' ) ) {

    function z_mini_menu_render_settings_page() {
        add_filter('admin_footer_text', 'z_mini_menu_admin_footer_print_thankyou', 900);
?>

		<div class="wrap">
			<h1><?php esc_attr_e('WP Mini Menu settings', 'z-mini-admin-menu'); ?></h1>	

            <?php
                $manage_options_uri = admin_url( 'options-general.php?page=z_mini_menu_plugin&tab=manage_options' );
                $order_options_uri = admin_url( 'options-general.php?page=z_mini_menu_plugin&tab=order_options' );

                $active_tab = 'manage_options';
                if( isset( $_GET[ 'tab' ] ) && isset( $_GET[ '_wpnonce' ] ) ) {
                    if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET[ '_wpnonce' ] ) ), 'manage_options_tab' ) ) {
                        $active_tab = 'manage_options';
                    } elseif( wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET[ '_wpnonce' ] ) ), 'order_options_tab' ) ) {
                        $active_tab = 'order_options';
                    }
                }

            ?><h2 class="nav-tab-wrapper">
                <a class="nav-tab<?php echo $active_tab == 'manage_options' ? ' nav-tab-active' : ''; ?>" id="manage-tab" href="<?php echo esc_url( wp_nonce_url( $manage_options_uri, 'manage_options_tab' ) ); ?>"><?php esc_attr_e('Manage items', 'z-mini-admin-menu'); ?></a>
                <a class="nav-tab<?php echo $active_tab == 'order_options' ? ' nav-tab-active' : ''; ?>" id="order-tab" href="<?php echo esc_url( wp_nonce_url( $order_options_uri , 'order_options_tab') ); ?>"><?php esc_attr_e('Sort items', 'z-mini-admin-menu'); ?></a>
            </h2>

			<form action="options.php" method="post">
				<?php

                if( $active_tab == 'manage_options' ) {
					settings_fields( 'z_mini_menu_plugin_options' );
					do_settings_sections( 'z_mini_menu_plugin' );
                }

                if( $active_tab == 'order_options' ) {
					settings_fields( 'z_mini_menu_plugin_order' );
					do_settings_sections( 'z_mini_menu_plugin_order' );

		
					$options = get_option( 'z_mini_menu_plugin_options' );							
					$options_order = get_option( 'z_mini_menu_plugin_order' );
					$ordered_options = array();

					// re-order items
					if( !empty($options_order) ) {
						// loop through all ordered items and add them to new
						foreach($options_order as $key => $option) {
							if( !is_numeric($option)) {
								if(isset($options[$option])) {
									$ordered_options[$key] = $option;
								}
								unset($options[$option]);
							} else {
								if(isset($options['use_custom'][$option])) {
									$ordered_options[$key] = $option;
								}
								unset($options['use_custom'][$option]);
							}
						}
					}
					// loop through remaining options
					foreach($options as $key => $option) {
						if( $key == 'bg_color' || $key == 'use_after_main' || $key == 'use_roles') {
							continue;
						}
						if( $key == 'use_custom' ) {
							foreach($option as $subkey => $custom ) {
								$ordered_options[] = $subkey;
							}
						} else {
							$ordered_options[] = $key;
						}
					}
					
					echo '<div id="mini-menu-sorts">';
					$options = get_option( 'z_mini_menu_plugin_options' ); // init again
					foreach($ordered_options as $key => $item) {
						if( !is_numeric($item)) {
							foreach( Z_MINI_MENU_SETTINGS_SECTIONS[ 0 ][ 'items' ] as $settings_option ) {
								if( $settings_option['name'] == $item ) {
									$title = $settings_option['title'];
									$name = $item;
									$value = $key;
								}
							}
						} else {
							$title = $options['use_custom'][$item]['name'];
							$name = $item;
							$value = $key;

						}

						echo '<div class="z-mini-menu-sort-item">';
						echo '<input type="hidden" name="z_mini_menu_plugin_order['.esc_attr($value).']" value="'.esc_attr($name).'">';
						echo esc_html($title);
						echo '<span class="handle dashicons dashicons-before dashicons-menu"></span>';
						echo '</div>';
						
					}							
					echo '</div>';

                }

					submit_button();
				?>
			</form>
		</div>
<?php
	}
}










/*
 * 4.a. General output function for regular settings
 *
 *
 */ 
function z_mini_menu_item_display( $args ) {
    $name = $args[ 'item' ][ 'name' ];
    $label = $args[ 'item' ][ 'label' ];
	$checked = 0;

    $options = get_option( 'z_mini_menu_plugin_options' );
	if( isset( $options[ $name ] ) ) {
		if( !is_array( $options[ $name ] ) ) { // for older versions
			$checked = ( isset( $options[ $name ] ) && $options[ $name ] == 1 ) ? 1 : 0;

		} else {
			$checked = ( isset( $options[ $name ]['checked'] ) && $options[ $name ]['checked'] == 1 ) ? 1 : 0;
		}	
	}
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '<input type="checkbox" id="' . esc_attr($name) . '" name="z_mini_menu_plugin_options[' . esc_attr($name) . '][checked]" value="1"' . checked( 1, intval($checked), false ) . '/><label for="' . esc_attr($name) . '"> ' . z_mini_menu_esc_html_allowed($label) . '</label>';

}




/*
 * 4.b. General output for custom settings
 *
 *
 */ 
function z_mini_menu_ia_item_display( $args ) {
    $name = $args[ 'item' ][ 'name' ];

    $options = get_option( 'z_mini_menu_plugin_options' );
    $html = '';

    $last_key = 0;
    if ( !empty( $options[ $name ] ) ) {
        foreach ( $options[ $name ] as $item_key => $item ) {

            ?><div class="z-mini-menu-ia-item">
				<p><label><?php esc_html_e('Menu item name', 'z-mini-admin-menu'); ?></label><input class="regular-text" type="text" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][name]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][name]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'name' ] ) ) {
					echo esc_attr( $options[ $name ][ $item_key ][ 'name' ] );
            	} ?>"/></p>
	
				<p><label><?php esc_html_e('Menu url', 'z-mini-admin-menu'); ?></label><input class="regular-text" type="text" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][url]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][url]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'url' ] ) ) {
					echo esc_attr( $options[ $name ][ $item_key ][ 'url' ] );
            	} ?>"/></p>

				<p><label><?php esc_html_e('Menu icon', 'z-mini-admin-menu'); ?></label><span class="input-box"><span id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][icon]_icon" class="picked-icon dashicons <?php
				if ( isset( $options[ $name ][ $item_key ][ 'icon' ] ) ) {
                	echo esc_attr( $options[ $name ][ $item_key ][ 'icon' ] );
            	} ?>"></span><input class="regular-text" type="hidden" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][icon]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][icon]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'icon' ] ) ) {
                	echo esc_attr( $options[ $name ][ $item_key ][ 'icon' ] );
            	} ?>"/><input type="button" data-target="#<?php echo esc_attr($name); ?>\[<?php echo esc_attr($item_key); ?>\]\[icon\]" data-icon="#<?php echo esc_attr($name); ?>\[<?php echo esc_attr($item_key); ?>\]\[icon\]_icon" class="button dashicons-picker" value="..." /></span></p>

				<p><label><?php esc_html_e('Restricted to', 'z-mini-admin-menu'); ?></label><select name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][role]"><?php z_mini_menu_print_roles_dropdown_options( esc_attr( $options[ $name ][ $item_key ][ 'role' ]) ); ?></select></p>

				<div class="z-mini-menu-btn-remove-ia">-</div>
           </div>
		<?php
        }
        $last_key = max( array_keys( $options[ $name ] ) );
    }

    ?><div class="z-mini-menu-ia-item-add-box"><a href="javascript:;" class="z-mini-menu-btn-add-ia button button-primary" data-last="<?php echo esc_attr($last_key); ?>"><i class="dashicons dashicons-plus-alt"></i> <?php esc_html_e( 'Add a custom menu item', 'z-mini-admin-menu' ); ?></a></div>

	<div class="z-mini-menu-admin-hidden" style="display:none;"><select id="z-mini-menu-dummy-options"><?php z_mini_menu_print_roles_dropdown_options(); ?></select></div><?php

}


/*
 * 4.c. Color settings field
 *
 *
 */
function z_mini_menu_color_picker_item_display( $args ) {
    $name = $args[ 'item' ][ 'name' ];

    $options = get_option( 'z_mini_menu_plugin_options' );

    echo '<input class="z-mini-menu-color-field" type="text" id="' . esc_attr($name) . '" name="z_mini_menu_plugin_options[' . esc_attr($name) . ']" value="';
    if ( isset( $options[ $name ] ) ) {
        echo esc_attr( $options[ $name ] );
    }
    echo '"/>';
}



/*
 * 4.d. User roles permit options settings field
 *
 *
 */
function z_mini_menu_use_roles_item_display( $args ) {
    $name = $args[ 'item' ][ 'name' ];

    $options = get_option( 'z_mini_menu_plugin_options' );
	
	if( empty($options[ $name ]) ) {
		$options[ $name ] = array (
            0 => 'administrator'
        );
	}
	
	global $wp_roles;
	$all_roles = $wp_roles->roles;

	foreach ($all_roles as $role => $details) {
		$selected_html = '';		
		if( in_array($role, $options[ $name ]) ) { $selected_html = ' checked="checked"'; };    
		echo '<label><input type="checkbox" name="z_mini_menu_plugin_options[' . esc_attr($name) . '][]" value="'.esc_attr($role).'"'.esc_html($selected_html).'/>'. esc_html(translate_user_role($details['name'])) .'</label><br />';
	}
}



/*
 * 4.e. Text sections
 *
 *
 */
function z_mini_menu_main_section_text() { /* Main settings text */
    echo '<p>' . esc_html__('Here you can set all the options for using the WordPress Mini Menu.', 'z-mini-admin-menu') . '<br />' . esc_html__('Note that these are global settings for all users. Whether or not these options are actually shown, is dependent of the invidual capabilities and roles.', 'z-mini-admin-menu') . '</p>';
}

function z_mini_menu_custom_section_text() { /* Custom settings text */ }

function z_mini_menu_other_section_text() { /* Other settings text */

    // do_action('admin_notices');

    echo '<table class="form-table" role="presentation"><tbody><tr><th scope="row">';
    echo '<span class="z-warning">' . esc_html__('Please note', 'z-mini-admin-menu') . '</span>';
    echo '</th><td>';
    echo esc_html__('As of version 2.0.2, the "Toolbar replacement" option is no longer available.', 'z-mini-admin-menu');
    echo '<br>';
    echo esc_html__('Toolbar preferences can now be managed per user profile.', 'z-mini-admin-menu');
    echo '<br>';
    echo esc_html__('By default, the Mini Menu will replace the WP Toolbar for the permitted roles below.', 'z-mini-admin-menu');
    echo '</td></tr></tbody></table>';
}

function z_mini_menu_ordering_section_text() { /* Order section text */
    echo '<p>' . esc_html__('Here you can sort the existing menu items.', 'z-mini-admin-menu') . '</p>';
}




/*
 * 5. Validation
 *
 *
 *
 */
function z_mini_menu_plugin_options_validate( $input ) {
    //  TODO NOT implemented yet
    //    $newinput['api_key'] = trim( $input['api_key'] );
    //    if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
    //        $newinput['api_key'] = '';
    //    }
    //    return $newinput;
    return $input;
}
function z_mini_menu_plugin_order_validate( $input ) {
    //  TODO NOT implemented yet
    //    $newinput['api_key'] = trim( $input['api_key'] );
    //    if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
    //        $newinput['api_key'] = '';
    //    }
    //    return $newinput;
    return $input;
}
function z_mini_menu_esc_html_allowed( $str ) {
	$allowed = array( 'br' => array(), 'em' => array(), 'strong' => array() );
	return wp_kses( $str, $allowed );
}




/*
 * Print select dropdown for roles
 *
 *
 */
function z_mini_menu_print_roles_dropdown_options( $selected = 'administrator') {
    global $wp_roles;

    $all_roles = $wp_roles->roles;
	
	$options_html = '';
    foreach ($all_roles as $role => $details) {
		$selected_html = '';
		if( $role == $selected) { $selected_html = ' selected="selected"'; };
		$options_html .= '<option value="'.esc_attr($role).'"'.$selected_html.'>'. translate_user_role($details['name']) .'</option>';
    }
    echo wp_kses(
        $options_html,
        [
            'option' => [
                'value' => [],
                'selected' => [],
            ]
        ]
    );
}





/*
 * Enqueue scripts and styles
 *
 *
 */
add_action( 'admin_enqueue_scripts', 'z_mini_menu_add_admin_scripts' );
function z_mini_menu_add_admin_scripts( $hook ) {
    if ( is_admin() ) {
		$plugin_url = plugins_url( '/', __FILE__ );
        $admin_css = $plugin_url . 'assets/admin-styles.css';
        wp_enqueue_style( 'z-mini-menu-admin-styles', esc_url($admin_css), array( 'dashicons', 'wp-color-picker' ), '1.0' );
        $admin_scripts = $plugin_url . 'assets/admin-scripts.js';
		wp_enqueue_script( 'z-mini-admin-scripts', esc_url($admin_scripts), array( 'wp-color-picker', 'jquery-ui-sortable' ), 1.0, true );
    }
}





/*
 * Add WP Mini menu preference to the individual user settings (edit-user.php
 * and profile.php) pages
 * 
 *
 */
add_action( 'show_user_profile', 'z_mini_menu_add_extra_user_fields' );
add_action( 'edit_user_profile', 'z_mini_menu_add_extra_user_fields' );
function z_mini_menu_add_extra_user_fields( $user ) {
    ?>
	<section id="z-mini-admin-personal-settings">
        <h3><?php esc_html_e('WP Mini Menu', 'z-mini-admin-menu'); ?></h3>
        <table class="form-table">
            <tr class="z-mini-admin-personal-settings-item">
                <th scope="row"><?php esc_html_e('Hide Mini Menu', 'z-mini-admin-menu'); ?></th>
                <td><?php
                    wp_nonce_field( 'z_mini_menu_user_setting_nonce', 'z_mini_menu_user_setting_nonce');
					$hide_mini_menu_explicitly = get_user_meta($user->ID, 'z_mini_admin_hide_mini_menu_explicitly', true)	;
					$selected_html = '';
					if( $hide_mini_menu_explicitly == 1 ) {
						$selected_html = ' checked="checked"';
					};    
						echo '<label><input type="checkbox" name="z_mini_admin_hide_mini_menu_explicitly" value="1"'.esc_html($selected_html).'> '. esc_html__('Prefer regular toolbar over WP Mini Menu', 'z-mini-admin-menu') .'</label>';
				?><p class="description"><?php esc_html_e('Show the regular WP toolbar on the front-end, not the WP Mini Menu (only when \'Show toolbar when viewing site \' is checked, of course).', 'z-mini-admin-menu'); ?></p></td>
            </tr>
        </table>
	</section>
    <?php
}

// Saving Updated fields data
add_action( 'personal_options_update', 'z_mini_menu_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'z_mini_menu_save_extra_user_fields' );
function z_mini_menu_save_extra_user_fields( $user_id ) {
    if( isset( $_POST[ 'z_mini_menu_user_setting_nonce' ] ) ) {
        if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ 'z_mini_menu_user_setting_nonce' ] ) ), 'z_mini_menu_user_setting_nonce' ) ) {
            if( !empty( $_POST['z_mini_admin_hide_mini_menu_explicitly'] ) ) {
                $value = filter_var(wp_unslash( $_POST['z_mini_admin_hide_mini_menu_explicitly'] ), FILTER_SANITIZE_NUMBER_INT);
            } else {
                $value = 0;
            }
            update_user_meta( $user_id, 'z_mini_admin_hide_mini_menu_explicitly', esc_attr( $value ) );
        }
    }
}


function z_mini_menu_admin_footer_print_thankyou( $data ) {
    $data = '<p class="zThanks"><a href="https://zodan.nl" target="_blank" rel="noreferrer">' .
                esc_html__('Made with', 'z-mini-admin-menu') . 
                '<svg id="heart" data-name="heart" xmlns="http://www.w3.org/2000/svg" width="745.2" height="657.6" version="1.1" viewBox="0 0 745.2 657.6"><path class="heart" d="M372,655.6c-2.8,0-5.5-1.3-7.2-3.6-.7-.9-71.9-95.4-159.9-157.6-11.7-8.3-23.8-16.3-36.5-24.8-60.7-40.5-123.6-82.3-152-151.2C0,278.9-1.4,217.6,12.6,158.6,28,93.5,59,44.6,97.8,24.5,125.3,10.2,158.1,2.4,190.2,2.4s.3,0,.4,0c34.7,0,66.5,9,92.2,25.8,22.4,14.6,70.3,78,89.2,103.7,18.9-25.7,66.8-89,89.2-103.7,25.7-16.8,57.6-25.7,92.2-25.8,32.3-.1,65.2,7.8,92.8,22.1h0c38.7,20.1,69.8,69,85.2,134.1,14,59.1,12.5,120.3-3.8,159.8-28.5,69-91.3,110.8-152,151.2-12.8,8.5-24.8,16.5-36.5,24.8-88.1,62.1-159.2,156.6-159.9,157.6-1.7,2.3-4.4,3.6-7.2,3.6Z"></path></svg>' .
                esc_html__('by Zodan', 'z-mini-admin-menu') .
            '</a></p>';

    return $data;
}