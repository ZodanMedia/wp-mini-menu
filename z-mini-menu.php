<?php
/**
 * Plugin Name: Z Mini Admin Menu
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 * Description: A mini menu to access most common admin items when te admin bar is not active
 * Version: 0.0.5
 * Author: Zodan
 * Author URI: https://zodan.nl
 * Text Domain: z-mini-menu
 * License: GPL2
 */


// Global variables
define('Z_MINI_MENU_VER', '0.0.5');
define('Z_MINI_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('Z_MINI_MENU_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

//$z_mini_menu_defaults = array(
//	'use_multisite' => 1,
//	'use_users' => 1,
//	'use_plugins' => 1,
//	'use_widgets' => 1,
//	'use_menus' => 1,
//	'use_woocommerce' => 1,
//	'use_acf' => 1,
//);
$z_mini_menu_defaults = array();
define('Z_MINI_MENU_DEFAULTS', $z_mini_menu_defaults);


// Add link to settings page on plugin overview
function z_mini_menu_settings_link($links) { 
	$settings_link = '<a href="options-general.php?page=z_mini_menu_plugin">'.__( 'Settings' ) . '</a>'; 
	array_unshift($links, $settings_link); 
	return $links; 
}
$z_mini_menu_basename = plugin_basename(__FILE__); 
add_filter("plugin_action_links_" . $z_mini_menu_basename, 'z_mini_menu_settings_link' );


include(Z_MINI_MENU_PLUGIN_PATH . '/admin.php');


function z_mini_menu_css_js() {
    wp_enqueue_style( 'z-mini-menu-css', Z_MINI_MENU_PLUGIN_URL . 'inc/style.css', $deps = false, $ver = Z_MINI_MENU_VER );
	wp_enqueue_style( 'dashicons' );
    wp_enqueue_script( 'jquery' );
	
    wp_register_script( 'z-mini-menu-js', Z_MINI_MENU_PLUGIN_URL . 'inc/scripts.js', $deps = array('jquery'), $ver = Z_MINI_MENU_VER, $in_footer = true );
    wp_enqueue_script( 'z-mini-menu-js' );

}
add_action( 'wp_enqueue_scripts', 'z_mini_menu_css_js');



function embed_z_mini_menu() {

	// only do stuff when
	// - we're not on the admin panel and
	// - the admin bar is not already showing
	if( is_user_logged_in() && !is_admin() && !is_admin_bar_showing() ) {
		
		/*
		 * Start the menu always with an edit post link (if we can), but let's first
		 * 1. Make an array of extra menu items we can possibly show
		 *
		 */
		
		$html_items = array();
		$options = wp_parse_args(get_option( 'z_mini_menu_plugin_options'), Z_MINI_MENU_DEFAULTS );
		
		// Dashboard
		if( current_user_can( 'manage_options' ) ) {
			$html_items[] = '<a href="'.admin_url('index.php').'" title="'.__( 'Visit dashboard', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-dashboard"><span class="sr-only">Dashboard</span></span>', 'textdomain' ).'</a>';
		}
		
		// Network
		if( current_user_can( 'manage_network' ) && is_multisite() ) {
			if( $options['use_multisite'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('network/sites.php').'" title="'.__( 'Manage the network', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-multisite"><span class="sr-only">Dashboard</span></span>', 'textdomain' ).'</a>';
			}
		}	
		
		// Menus
		if( current_user_can( 'edit_theme_options' ) ) {
			if( isset($options['use_menus']) && $options['use_menus'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('nav-menus.php').'" title="'.__( 'Manage menus', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-menu"><span class="sr-only">Menus</span></span>', 'textdomain' ).'</a>';
			}
		}	

		// Widgets
		if( current_user_can( 'edit_theme_options' ) ) {
			if( isset($options['use_widgets']) && $options['use_widgets'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('widgets.php').'" title="'.__( 'manage widgets', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-index-card"><span class="sr-only">Widgets</span></span>', 'textdomain' ).'</a>';
			}
		}

		// Plugins
		if( current_user_can( 'activate_plugins' ) ) {
			if( isset($options['use_plugins']) && $options['use_plugins'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('plugins.php').'" title="'.__( 'Manage plugins', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-plugins"><span class="sr-only">Plugins</span></span>', 'textdomain' ).'</a>';
			}
		}

		// Users
		if( current_user_can( 'edit_users' ) ) {
			if( isset($options['use_users']) && $options['use_users'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('users.php').'" title="'.__( 'Manage users', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-users"><span class="sr-only">Users</span></span>', 'textdomain' ).'</a>';
			}
		}
		
		// WooCommerce
		if ( class_exists( 'woocommerce' ) && current_user_can( 'manage_woocommerce' ) ) {
			if( isset($options['use_woocommerce']) && $options['use_woocommerce'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('admin.php?page=wc-admin').'" title="'.__( 'Manage WooCommerce', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-cart"><span class="sr-only">Manage WooCommerce</span></span>', 'textdomain' ).'</a>';
				$html_items[] = '<a href="'.admin_url('edit.php?post_type=product').'" title="'.__( 'Manage Products', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-screenoptions"><span class="sr-only">Manage Products</span></span>', 'textdomain' ).'</a>';
			}

		}

		// ACF
		if ( class_exists( 'ACF' ) && current_user_can( 'manage_options' ) ) {
			if( isset($options['use_acf']) && $options['use_acf'] == 1 ) {
				$html_items[] = '<a href="'.admin_url('edit.php?post_type=acf-field-group').'" title="'.__( 'Manage ACF', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-welcome-widgets-menus"><span class="sr-only">Manage ACF</span></span>', 'textdomain' ).'</a>';
			}
		}
		
		// Logout
		$html_items[] = '<a href="'.wp_logout_url().'" title="'.__( 'Logout', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-unlock"><span class="sr-only">Logout</span></span>', 'textdomain' ).'</a>';


		
		
		
		/*
		 * 2. Check if we have any items and if we can edit posts.
		 *    Else showing a menu makes no sense, right?
		 *
		 */
		
		if( count($html_items) > 0 || current_user_can( 'edit_posts' ) ) {
			// begin menu
			echo '<div id="admin-z-mini-menu" data-barba-prevent="all">';
			
			
			// Add edit link
			if( current_user_can( 'edit_posts' ) ) {
				edit_post_link( __( '<span class="dashicons-before dashicons-edit-large"><span class="sr-only">Edit</span></span>', 'textdomain' ), '<div class="z_mini_menu-item">', '</div>', null, 'btn-edit-post-link' );
			}	
			
			if( count($html_items) > 1 ) {
				// Expand
				echo '<div class="z_mini_menu-item expand">';
				echo '<a href="#z-mini-menu-expanded" id="expand-z-mini-menu" title="'.__( 'Expand mini menu', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-ellipsis"><span class="sr-only">Expand mini menu</span></span>', 'textdomain' ).'</a>';
				echo '</div>';

				echo '<div class="z_mini_menu-item-holder">';
				z_print_mini_menu_items($html_items);
				echo '</div>';

				echo '<div class="z_mini_menu-item collapse">';
				echo '<a href="#z-mini-menu-collapsed" id="collapse-z-mini-menu" title="'.__( 'Collapse mini menu', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-ellipsis"><span class="sr-only">Expand mini menu</span></span>', 'textdomain' ).'</a>';
				echo '</div>';


			} else {
				z_print_mini_menu_items($html_items);
			}
			
			// end menu
			echo '</div>';
		}	
	}	
}


$options = get_option( 'z_mini_menu_plugin_options' );

if( isset($options['use_after_main']) && $options['use_after_main'] == 1 ) {
	add_action('after_main', 'embed_z_mini_menu');
} else {
	add_action('wp_footer', 'embed_z_mini_menu');
}


function z_print_mini_menu_items( $html_items = array() ) {
	foreach($html_items as $item) {
		echo '<div class="z_mini_menu-item">';
		echo $item;
		echo '</div>';
	}
}
