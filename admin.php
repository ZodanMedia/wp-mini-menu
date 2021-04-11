<?php

/**
 * Settings page for WordPress mini admin menu
 *
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 *
 * Version: 0.0.6
 * Author: Zodan
 * Author URI: https://zodan.nl
 * License: GPL2
 */



// Create settings page
function z_mini_menu_add_settings_page() {
    add_options_page( 'Wordpress mini admin settings', 'WP mini menu', 'manage_options', 'z_mini_menu_plugin', 'z_mini_menu_render_settings_page' );
}
add_action( 'admin_menu', 'z_mini_menu_add_settings_page' );



// Render settings page
function z_mini_menu_render_settings_page() {
    ?>
	<div class="wrap">
		<h1>Wordpress Mini Menu settings</h1>
		<form action="options.php" method="post">
			<?php 
			settings_fields( 'z_mini_menu_plugin_options' );
			do_settings_sections( 'z_mini_menu_plugin' ); ?>
			<input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
		</form>
	</div>
    <?php
}



// Register settings
function z_mini_menu_register_settings() {
    register_setting( 'z_mini_menu_plugin_options', 'z_mini_menu_plugin_options', 'z_mini_menu_plugin_options_validate' );
	
    add_settings_section( 'main_settings', '', 'z_mini_menu_main_section_text', 'z_mini_menu_plugin' );

	// Network
	if( is_multisite() ) {
		add_settings_field( 'z_mini_menu_setting_network', 'WP Network', 'z_mini_menu_setting_network', 'z_mini_menu_plugin', 'main_settings' );
	}
	
	// Add new
	add_settings_field( 'z_mini_menu_setting_add_new', 'Add new', 'z_mini_menu_setting_add_new', 'z_mini_menu_plugin', 'main_settings' );
	
	// Menus
	add_settings_field( 'z_mini_menu_setting_menus', 'Menus', 'z_mini_menu_setting_menus', 'z_mini_menu_plugin', 'main_settings' );
	
	// Widgets 
	add_settings_field( 'z_mini_menu_setting_widgets', 'Widgets', 'z_mini_menu_setting_widgets', 'z_mini_menu_plugin', 'main_settings' );
	
	// Plugins
	add_settings_field( 'z_mini_menu_setting_plugins', 'Plugins', 'z_mini_menu_setting_plugins', 'z_mini_menu_plugin', 'main_settings' );
	
	// Users
	add_settings_field( 'z_mini_menu_setting_users', 'Users', 'z_mini_menu_setting_users', 'z_mini_menu_plugin', 'main_settings' );
	
	// WooCommerce
	if ( class_exists( 'woocommerce' ) ) {
		add_settings_field( 'z_mini_menu_setting_woocommerce', 'Woocommerce', 'z_mini_menu_setting_woocommerce', 'z_mini_menu_plugin', 'main_settings' );
	}
	
	// Advanced custom fields
	if ( class_exists( 'ACF' ) ) {
		add_settings_field( 'z_mini_menu_setting_acf', 'ACF', 'z_mini_menu_setting_acf', 'z_mini_menu_plugin', 'main_settings' );
	}
	
	
	add_settings_section( 'where_settings', '', 'z_mini_menu_where_section_text', 'z_mini_menu_plugin' );
	
	// Location
	add_settings_field( 'z_mini_menu_setting_location', 'Location', 'z_mini_menu_setting_location', 'z_mini_menu_plugin', 'where_settings' );
}
add_action( 'admin_init', 'z_mini_menu_register_settings' );



function z_mini_menu_main_section_text() {
    echo '<p>Here you can set all the options for using the WordPress Mini Menu.<br />Note that these are global settings for all users. Whether or not these options are actually shown, is dependent of the invidual capabilities and roles.</p>';
}

function z_mini_menu_where_section_text() {
    echo '<p>Where do you want to put the WordPress Mini Menu?</p>';
}


function z_mini_menu_plugin_options_validate( $input ) {
//    $newinput['api_key'] = trim( $input['api_key'] );
//    if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
//        $newinput['api_key'] = '';
//    }
//    return $newinput;
	return $input;
}



// Register setting functions
function z_mini_menu_setting_location() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_after_main = (isset($options['use_after_main']) && $options['use_after_main'] == 1) ? 1 : 0;
	
    $html = '<input type="checkbox" id="use_after_main" name="z_mini_menu_plugin_options[use_after_main]" value="1"' . checked( 1, $use_after_main, false ) . '/>';
    $html .= '<label for="use_after_main"> Place after main content - you might want to check this if you are using a page loader like BarbaJs ( if unchecked, the menu will be placed at the end of the &lt;body&gt; )</label>';
	
	echo $html;
}

function z_mini_menu_setting_network() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_multisite = (isset($options['use_multisite']) && $options['use_multisite'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_multisite" name="z_mini_menu_plugin_options[use_multisite]" value="1"' . checked( 1, $use_multisite, false ) . '/>';
    $html .= '<label for="use_multisite"> Include a link to the Network admin</label>';
	
	echo $html;
}

function z_mini_menu_setting_add_new() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_users = (isset($options['use_add_new']) && $options['use_add_new'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_add_new" name="z_mini_menu_plugin_options[use_add_new]" value="1"' . checked( 1, $use_users, false ) . '/>';
    $html .= '<label for="use_add_new"> Include a link to adding new posts/pages/customs post types (depending on user capabilities)</label>';
	
	echo $html;
}

function z_mini_menu_setting_users() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_users = (isset($options['use_users']) && $options['use_users'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_users" name="z_mini_menu_plugin_options[use_users]" value="1"' . checked( 1, $use_users, false ) . '/>';
    $html .= '<label for="use_users"> Include a link to the WordPress Users section</label>';
	
	echo $html;
}

function z_mini_menu_setting_plugins() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_plugins = (isset($options['use_plugins']) && $options['use_plugins'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_plugins" name="z_mini_menu_plugin_options[use_plugins]" value="1"' . checked( 1, $use_plugins, false ) . '/>';
    $html .= '<label for="use_plugins"> Include a link to the Plugins section</label>';
	
	echo $html;
}

function z_mini_menu_setting_widgets() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_widgets = (isset($options['use_widgets']) && $options['use_widgets'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_widgets" name="z_mini_menu_plugin_options[use_widgets]" value="1"' . checked( 1, $use_widgets, false ) . '/>';
    $html .= '<label for="use_widgets"> Include a link to the Widgets section</label>';
	
	echo $html;
}

function z_mini_menu_setting_menus() {
	$options = get_option( 'z_mini_menu_plugin_options');
	$use_menus = (isset($options['use_menus']) && $options['use_menus'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_menus" name="z_mini_menu_plugin_options[use_menus]" value="1"' . checked( 1, $use_menus, false ) . '/>';
    $html .= '<label for="use_menus"> Include a link to the Menus section</label>';
	
	echo $html;
}

function z_mini_menu_setting_woocommerce() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_woocommerce = (isset($options['use_woocommerce']) && $options['use_woocommerce'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_woocommerce" name="z_mini_menu_plugin_options[use_woocommerce]" value="1"' . checked( 1, $use_woocommerce, false ) . '/>';
    $html .= '<label for="use_woocommerce"> Include the Woocommerce admin and products links</label>';

   	echo $html;
}

function z_mini_menu_setting_acf() {
	$options = get_option( 'z_mini_menu_plugin_options' );
	$use_acf = (isset($options['use_acf']) && $options['use_acf'] == 1) ? 1 : 0;

    $html = '<input type="checkbox" id="use_acf" name="z_mini_menu_plugin_options[use_acf]" value="1"' . checked( 1, $use_acf, false ) . '/>';
    $html .= '<label for="use_acf"> Include a link to Advanced Custom Fields</label>';

	echo $html;
}
