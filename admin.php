<?php

/**
 * Settings page for WordPress mini admin menu
 *
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
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
 *
 *
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

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'name' ] = 'use_woo_products';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'title' ] = __( 'Woocommerce products', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'label' ] = __('Include the Woocommerce products link', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 10 ][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'name' ] = 'use_fforms';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'title' ] = __('FluentForms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'label' ] = __('Include a link to FluentForms', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 11 ][ 'condition' ] = array( 'if_function_exists', 'wpFluentForm' );




$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'name' ] = 'use_wpseo';
$z_mini_menu_settings_sections[ 0 ][ 'items' ][ 7 ][ 'title' ] = __( 'SEO (Yoast)', 'z-mini-admin-menu', 'z-mini-admin-menu');
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
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'label' ] = __('', 'z-mini-admin-menu');
$z_mini_menu_settings_sections[ 2 ][ 'items' ][ 2 ][ 'condition' ] = array( 'use_roles_permit' );




/*
 * 2. Register all settings
 *
 *
 */
if ( !function_exists( 'z_mini_menu_register_settings' ) ) {

    function z_mini_menu_register_settings() {
        global $z_mini_menu_settings_sections;
		
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
        foreach ( $z_mini_menu_settings_sections as $section ) {
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
        add_options_page( 'Wordpress mini admin settings', 'WP mini menu', 'manage_options', 'z_mini_menu_plugin', 'z_mini_menu_render_settings_page' );
		add_options_page( 'Ordering mini admin menu items', 'WP mini menu order', 'manage_options', 'z_mini_menu_plugin_order', 'z_mini_menu_render_order_items_page' );
		
		// remove ordering from menu
		remove_submenu_page( 'options-general.php', 'z_mini_menu_plugin_order' );
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
?>
		<div class="wrap">
			<h1><?php _e('Wordpress Mini Menu settings', 'z-mini-admin-menu'); ?></h1>	
			<h2 class="nav-tab-wrapper" id="wpseo-tabs">
				<a class="nav-tab nav-tab-active" id="manage-tab" href="<?php echo esc_url( admin_url( 'options-general.php?page=z_mini_menu_plugin' ) ); ?>"><?php _e('Manage items', 'z-mini-admin-menu'); ?></a>
				<a class="nav-tab" id="order-tab" href="<?php echo esc_url( admin_url( 'options-general.php?page=z_mini_menu_plugin_order' ) ); ?>"><?php _e('Sort items', 'z-mini-admin-menu'); ?></a>
			</h2>
			<form action="options.php" method="post">
				<?php
					settings_fields( 'z_mini_menu_plugin_options' );
					do_settings_sections( 'z_mini_menu_plugin' );
					submit_button();
				?>
			</form>
		</div>
<?php
	}
}


/*
 * 3.b.2. Render ordering items page
 *
 *
 */ 
if ( !function_exists( 'z_mini_menu_render_order_items_page' ) ) {

    function z_mini_menu_render_order_items_page() {
		global $z_mini_menu_settings_sections;
?>
		<div class="wrap">
			<h1><?php _e('Wordpress Mini Menu settings', 'z-mini-admin-menu'); ?></h1>
			<h2 class="nav-tab-wrapper" id="wpseo-tabs">
				<a class="nav-tab" id="manage-tab" href="<?php echo esc_url( admin_url( 'options-general.php?page=z_mini_menu_plugin' ) ); ?>"><?php _e('Manage items', 'z-mini-admin-menu'); ?></a>
				<a class="nav-tab nav-tab-active" id="order-tab" href="<?php echo esc_url( admin_url( 'options-general.php?page=z_mini_menu_plugin_order' ) ); ?>"><?php _e('Sort items', 'z-mini-admin-menu'); ?></a>
			</h2>
			<form action="options.php" method="post">
				<?php
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
							foreach( $z_mini_menu_settings_sections[ 0 ][ 'items' ] as $settings_option ) {
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

    echo '<input type="checkbox" id="' . esc_attr($name) . '" name="z_mini_menu_plugin_options[' . esc_attr($name) . '][checked]" value="1"' . checked( 1, $checked, false ) . '/><label for="' . esc_attr($name) . '"> ' . z_mini_menu_esc_html_allowed($label) . '</label>';

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
				<p><label><?php _e('Menu item name', 'z-mini-admin-menu'); ?></label><input class="regular-text" type="text" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][name]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][name]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'name' ] ) ) {
					echo esc_attr( $options[ $name ][ $item_key ][ 'name' ] );
            	} ?>"/></p>
	
				<p><label><?php _e('Menu url', 'z-mini-admin-menu'); ?></label><input class="regular-text" type="text" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][url]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][url]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'url' ] ) ) {
					echo esc_attr( $options[ $name ][ $item_key ][ 'url' ] );
            	} ?>"/></p>

				<p><label><?php _e('Menu icon', 'z-mini-admin-menu'); ?></label><span class="input-box"><span id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][icon]_icon" class="picked-icon dashicons <?php
				if ( isset( $options[ $name ][ $item_key ][ 'icon' ] ) ) {
                	echo esc_attr( $options[ $name ][ $item_key ][ 'icon' ] );
            	} ?>"></span><input class="regular-text" type="hidden" id="<?php echo esc_attr($name); ?>[<?php echo esc_attr($item_key); ?>][icon]" name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][icon]" value="<?php
				if ( isset( $options[ $name ][ $item_key ][ 'icon' ] ) ) {
                	echo esc_attr( $options[ $name ][ $item_key ][ 'icon' ] );
            	} ?>"/><input type="button" data-target="#<?php echo esc_attr($name); ?>\[<?php echo esc_attr($item_key); ?>\]\[icon\]" data-icon="#<?php echo esc_attr($name); ?>\[<?php echo esc_attr($item_key); ?>\]\[icon\]_icon" class="button dashicons-picker" value="..." /></span></p>
				
			
				<p><label><?php _e('Restricted to', 'z-mini-admin-menu'); ?></label><select name="z_mini_menu_plugin_options[<?php echo esc_attr($name); ?>][<?php echo esc_attr($item_key); ?>][role]"><?php print_roles_dropdown_options( esc_attr( $options[ $name ][ $item_key ][ 'role' ]) ); ?></select></p>

				<div class="z-mini-menu-btn-remove-ia">-</div>
           </div>
		<?php
        }
        $last_key = max( array_keys( $options[ $name ] ) );
    }

    ?><div class="z-mini-menu-ia-item-add-box"><a href="javascript:;" class="z-mini-menu-btn-add-ia button button-primary" data-last="<?php echo esc_attr($last_key); ?>"><i class="dashicons dashicons-plus-alt"></i> <?php _e( 'Add a custom menu item', 'z-mini-admin-menu' ); ?></a></div>

	<div class="z-mini-menu-admin-hidden" style="display:none;"><select id="z-mini-menu-dummy-options"><?php print_roles_dropdown_options(); ?></select></div><?php

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
		echo '<label><input type="checkbox" name="z_mini_menu_plugin_options[' . esc_attr($name) . '][]" value="'.esc_attr($role).'"'.$selected_html.'/>'. translate_user_role($details['name']) .'</label><br />';
	}
}


/*
 * 4.e. Text sections
 *
 *
 */
function z_mini_menu_main_section_text() { /* Main settings text */
    echo '<p>Here you can set all the options for using the WordPress Mini Menu.<br />Note that these are global settings for all users. Whether or not these options are actually shown, is dependent of the invidual capabilities and roles.</p>';
}

function z_mini_menu_custom_section_text() { /* Custom settings text */ }

function z_mini_menu_other_section_text() { /* Other settings text */ }

function z_mini_menu_ordering_section_text() { /* Order section text */
    echo '<p>Here you can sort the existing menu items.</p>';
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
 *
 */
function print_roles_dropdown_options( $selected = 'administrator') {
    global $wp_roles;

    $all_roles = $wp_roles->roles;
	
	$options_html = '';
    foreach ($all_roles as $role => $details) {
		$selected_html = '';
		if( $role == $selected) { $selected_html = ' selected="selected"'; };
		$options_html .= '<option value="'.esc_attr($role).'"'.$selected_html.'>'. translate_user_role($details['name']) .'</option>';
    }
	echo $options_html;
}



/*
 * Enqueue scripts and styles
 *
 *
 *
 */
function z_mini_menu_add_admin_scripts( $hook ) {
    if ( is_admin() ) {
        $admin_css = Z_MINI_ADMIN_MENU_PLUGIN_URL . 'inc/admin-styles.css';
        wp_enqueue_style( 'z-mini-menu-admin-styles', esc_url($admin_css), array( 'dashicons', 'wp-color-picker' ), '1.0' );
        $admin_scripts = Z_MINI_ADMIN_MENU_PLUGIN_URL . 'inc/admin-scripts.js';
		wp_enqueue_script( 'z-mini-admin-scripts', esc_url($admin_scripts), array( 'wp-color-picker', 'jquery-ui-sortable' ), false, true );
    }
}
add_action( 'admin_enqueue_scripts', 'z_mini_menu_add_admin_scripts' );
