<?php

/**
 * Settings page for WordPress mini admin menu
 *
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 *
 * Version: 0.0.7
 * Author: Zodan
 * Author URI: https://zodan.nl
 * License: GPL2
 */



// 1. Define settings sections for the plugin options page
$settings_sections[0]['name'] = 'main_settings';
$settings_sections[0]['title'] = 'Main (built-in) menu items';
$settings_sections[0]['callback'] = 'z_mini_menu_main_section_text';
$settings_sections[0]['items'] = array();

$settings_sections[0]['items'][0]['name'] = 'use_add_new';
$settings_sections[0]['items'][0]['title'] = 'Add new';
$settings_sections[0]['items'][0]['label'] = 'Include a link to add new posts/pages/customs post types (depending on user capabilities)';
$settings_sections[0]['items'][0]['condition'] = array('');

$settings_sections[0]['items'][1]['name'] = 'use_multisite';
$settings_sections[0]['items'][1]['title'] = 'WP Network';
$settings_sections[0]['items'][1]['label'] = 'Include a link to the Network admin';
$settings_sections[0]['items'][1]['condition'] = array('if_is_multisite');

$settings_sections[0]['items'][2]['name'] = 'use_menus';
$settings_sections[0]['items'][2]['title'] = 'Menus';
$settings_sections[0]['items'][2]['label'] = 'Include a link to the Menus section';
$settings_sections[0]['items'][2]['condition'] = array('');

$settings_sections[0]['items'][3]['name'] = 'use_widgets';
$settings_sections[0]['items'][3]['title'] = 'Widgets';
$settings_sections[0]['items'][3]['label'] = 'Include a link to the Widgets section';
$settings_sections[0]['items'][3]['condition'] = array('');

$settings_sections[0]['items'][4]['name'] = 'use_plugins';
$settings_sections[0]['items'][4]['title'] = 'Plugins';
$settings_sections[0]['items'][4]['label'] = 'Include a link to the Plugins section';
$settings_sections[0]['items'][4]['condition'] = array('');

$settings_sections[0]['items'][5]['name'] = 'use_users';
$settings_sections[0]['items'][5]['title'] = 'Users';
$settings_sections[0]['items'][5]['label'] = 'Include a link to the WordPress Users section';
$settings_sections[0]['items'][5]['condition'] = array('');

$settings_sections[0]['items'][6]['name'] = 'use_woocommerce';
$settings_sections[0]['items'][6]['title'] = 'Woocommerce';
$settings_sections[0]['items'][6]['label'] = 'Include the Woocommerce admin and products links';
$settings_sections[0]['items'][6]['condition'] = array('if_class_exists', 'woocommerce');


$settings_sections[0]['items'][7]['name'] = 'use_wpseo';
$settings_sections[0]['items'][7]['title'] = 'SEO (Yoast)';
$settings_sections[0]['items'][7]['label'] = 'Include a link to the WP SEO (Yoast) dashboard';
$settings_sections[0]['items'][7]['condition'] = array('if_class_exists', 'WPSEO_Options');

$settings_sections[0]['items'][8]['name'] = 'use_acf';
$settings_sections[0]['items'][8]['title'] = 'ACF';
$settings_sections[0]['items'][8]['label'] = 'Include a link to Advanced Custom Fields';
$settings_sections[0]['items'][8]['condition'] = array('if_class_exists', 'ACF');

$settings_sections[0]['items'][9]['name'] = 'use_wpml';
$settings_sections[0]['items'][9]['title'] = 'WPML';
$settings_sections[0]['items'][9]['label'] = 'Include a link to the WPML dashboard';
$settings_sections[0]['items'][9]['condition'] = array('if_function_exists', 'icl_object_id');



$settings_sections[1]['name'] = 'custom_settings';
$settings_sections[1]['title'] = 'Custom menu items';
$settings_sections[1]['callback'] = 'z_mini_menu_custom_section_text';
$settings_sections[1]['items'] = array();

$settings_sections[1]['items'][0]['name'] = 'use_custom';
$settings_sections[1]['items'][0]['title'] = 'Custom items';
$settings_sections[1]['items'][0]['label'] = '';
$settings_sections[1]['items'][0]['condition'] = array('interactive_fields');



$settings_sections[2]['name'] = 'other_settings';
$settings_sections[2]['title'] = 'Other settings';
$settings_sections[2]['callback'] = 'z_mini_menu_other_section_text';
$settings_sections[2]['items'] = array();

$settings_sections[2]['items'][0]['name'] = 'bg_color';
$settings_sections[2]['items'][0]['title'] = 'Background color';
$settings_sections[2]['items'][0]['label'] = '';
$settings_sections[2]['items'][0]['condition'] = array('use_color_picker');

$settings_sections[2]['items'][1]['name'] = 'use_after_main';
$settings_sections[2]['items'][1]['title'] = 'Output location';
$settings_sections[2]['items'][1]['label'] = 'Output after main content.<br />You might want to check this if you are using a page loader like BarbaJs.<br />If <em>unchecked</em>, the menu will be placed at the end of the &lt;body&gt; (recommended).';
$settings_sections[2]['items'][1]['condition'] = array('');







// 2. Create settings page
if ( !function_exists( 'z_mini_menu_add_settings_page' ) ) {
	function z_mini_menu_add_settings_page() {
		add_options_page( 'Wordpress mini admin settings', 'WP mini menu', 'manage_options', 'z_mini_menu_plugin', 'z_mini_menu_render_settings_page' );
	}
	add_action( 'admin_menu', 'z_mini_menu_add_settings_page' );
	
}

// 3. Render settings page
if ( !function_exists( 'z_mini_menu_render_settings_page' ) ) {
	
	function z_mini_menu_render_settings_page() {
		?>
		<div class="wrap">
			<h1>Wordpress Mini Menu settings</h1>
			<form action="options.php" method="post">
				<?php 
				settings_fields( 'z_mini_menu_plugin_options' );
				do_settings_sections( 'z_mini_menu_plugin' );
				submit_button();
				
				?>
				<!-- <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" /> -->
			</form>
		</div>
		<?php
	}
}




// 4.a. Register all settings
if ( !function_exists( 'z_mini_menu_register_settings' ) ) {
	
	function z_mini_menu_register_settings() {
		global $settings_sections;
		
		register_setting( 'z_mini_menu_plugin_options', 'z_mini_menu_plugin_options', 'z_mini_menu_plugin_options_validate' );
	
		// loop through all settings
		foreach( $settings_sections as $section ) {
			// add section
			add_settings_section( $section['name'], $section['title'], $section['callback'], 'z_mini_menu_plugin', $section );

			// loop through the items
			foreach(  $section['items'] as $item ) {

				if( $item['condition'][0] == 'if_class_exists' && !class_exists( $item['condition'][1]) ) {
					continue;
				}

				if( $item['condition'][0] == 'if_function_exists' && !function_exists( $item['condition'][1]) ) {
					continue;
				}
				
				if( $item['condition'][0] == 'if_is_multisite' && !is_multisite() ) {
					continue;
				}
				if( $item['condition'][0] == 'interactive_fields' ) {
					add_settings_field(
						'z_mini_menu_setting_'.$item['name'],
						$item['title'],
						'z_mini_menu_ia_item_display',
						'z_mini_menu_plugin',
						$section['name'],
						array(
							'item' => $item
						)
					);
					
				} elseif( $item['condition'][0] == 'use_color_picker' ) {
					add_settings_field(
						'z_mini_menu_setting_'.$item['name'],
						$item['title'],
						'z_mini_menu_color_picker_item_display',
						'z_mini_menu_plugin',
						$section['name'],
						array(
							'item' => $item
						)
					);

				} else {
					add_settings_field(
						'z_mini_menu_setting_'.$item['name'],
						$item['title'],
						'z_mini_menu_item_display',
						'z_mini_menu_plugin',
						$section['name'],
						array(
							'item' => $item
						)
					);
				}
			}
		}
	}
	add_action( 'admin_init', 'z_mini_menu_register_settings' );

}



// 4.b. General output function for regular settings
function z_mini_menu_item_display($args){
	$name = $args['item']['name'];
	$label = $args['item']['label'];	
	
	$options = get_option( 'z_mini_menu_plugin_options' );
	$$name = (isset($options[$name]) && $options[$name] == 1) ? 1 : 0;

	echo '<input type="checkbox" id="'.$name.'" name="z_mini_menu_plugin_options['.$name.']" value="1"' . checked( 1, ${$name}, false ) . '/><label for="'.$name.'"> '.$label.'</label>';
	
}


// 4.c. General output for custom settings
function z_mini_menu_ia_item_display($args){
	$name = $args['item']['name'];
	// $label = $args['item']['label'];	
	
	$options = get_option( 'z_mini_menu_plugin_options' );
	$html = '';
	
	$last_key = 0;
	if( !empty($options[$name]) ) {
		foreach($options[$name] as $item_key => $item) {
			
			$html .= '<div class="z-mini-menu-ia-item">';
			$html .= '<p><label>Menu name</label><input class="regular-text" type="text" id="'.$name.'['.$item_key.'][name]" name="z_mini_menu_plugin_options['.$name.']['.$item_key.'][name]" value="';
			if( isset( $options[$name][$item_key]['name'] ) ) { $html .= esc_attr( $options[$name][$item_key]['name'] ); }
			$html .= '"/></p>';

			$html .= '<p><label>Menu url</label><input class="regular-text" type="text" id="'.$name.'['.$item_key.'][url]" name="z_mini_menu_plugin_options['.$name.']['.$item_key.'][url]" value="';
			if( isset( $options[$name][$item_key]['url'] ) ) { $html .= esc_attr( $options[$name][$item_key]['url'] ); }
			$html .= '"/></p>';

			$html .= '<p><label>Menu icon</label><span class="input-box"><span id="'.$name.'['.$item_key.'][icon]_icon" class="picked-icon dashicons ';
			if( isset( $options[$name][$item_key]['icon'] ) ) { $html .= esc_attr( $options[$name][$item_key]['icon'] ); }
			$html .= '"></span>';
			$html .= '<input class="regular-text" type="hidden" id="'.$name.'['.$item_key.'][icon]" name="z_mini_menu_plugin_options['.$name.']['.$item_key.'][icon]" value="';	
			if( isset( $options[$name][$item_key]['icon'] ) ) { $html .= esc_attr( $options[$name][$item_key]['icon'] ); }
			$html .= '"/>';
			$html .= '<input type="button" data-target="#'.$name.'\\['.$item_key.'\\]\\[icon\\]" data-icon="#'.$name.'\\['.$item_key.'\\]\\[icon\\]_icon" class="button dashicons-picker" value="..." /></span></p>';

			$html .= '<div class="z-mini-menu-btn-remove-ia">-</div>';
			$html .= '</div>';
			
		}
		$last_key = max(array_keys($options[$name]));
	}	
	
	$html .= '<div class="z-mini-menu-ia-item-add-box"><a href="javascript:;" class="z-mini-menu-btn-add-ia button button-primary" data-last="'.$last_key.'"><i class="dashicons dashicons-plus-alt"></i> Add custom menu item</a></div>';

	echo $html;	
}

// 4.d. Color settings field
function z_mini_menu_color_picker_item_display($args) {
	$name = $args['item']['name'];
	
	$options = get_option( 'z_mini_menu_plugin_options' );
	
	$html = '<input class="z-mini-menu-color-field" type="text" id="'.$name.'" name="z_mini_menu_plugin_options['.$name.']" value="';
	if( isset( $options[$name] ) ) { $html .= esc_attr( $options[$name] ); }
	$html .= '"/>';

	echo $html;	
	
}







function z_mini_menu_main_section_text() { // Main settings text
    echo '<p>Here you can set all the options for using the WordPress Mini Menu.<br />Note that these are global settings for all users. Whether or not these options are actually shown, is dependent of the invidual capabilities and roles.</p>';
}
function z_mini_menu_custom_section_text() { // Custom settings text
    // echo '<p>TODO: manually add custom entries</p>';
}
function z_mini_menu_other_section_text() { // Other settings text
    // echo '<p>Where do you want to put the WordPress Mini Menu?</p>';
}




function z_mini_menu_plugin_options_validate( $input ) {
//    $newinput['api_key'] = trim( $input['api_key'] );
//    if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
//        $newinput['api_key'] = '';
//    }
//    return $newinput;
	return $input;
}


function z_mini_menu_add_admin_scripts( $hook ) {
    if( is_admin() ) { 		
		$admin_css = plugin_dir_url( __FILE__ ) . 'inc/admin-styles.css';
		wp_enqueue_style( 'z-mini-menu-admin-styles', $admin_css, array( 'dashicons' ), '1.0' );
        wp_enqueue_style( 'wp-color-picker' );
		$admin_scripts = plugins_url( 'inc/admin-scripts.js', __FILE__ );
        wp_enqueue_script( 'z-mini-admin-scripts', $admin_scripts, array( 'wp-color-picker' ), false, true ); 
    }
}
add_action( 'admin_enqueue_scripts', 'z_mini_menu_add_admin_scripts' );

