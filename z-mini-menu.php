<?php
/**
 * Plugin Name: WordPress mini admin menu
 * Plugin URI: https://zodan.nl
 * Description: A mini menu to access most common admin items when te admin bar is not active
 * Version: 0.0.1
 * Author: Zodan
 * Author URI: https://zodan.nl
 * Text Domain: z-mini-menu
 * License: GPL2
 */


// Global variables
define('Z_MINI_MENU_VER', '0.0.1');
define('Z_MINI_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('Z_MINI_MENU_PLUGIN_PATH', plugin_dir_path( __FILE__ ));



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
	if( !is_admin() && !is_admin_bar_showing() ) {
		
		/*
		 * Start the menu always with an edit post link (if we can), but let's first
		 * 1. Make an array of extra menu items we can possibly show
		 *
		 */
		
		$html_items = array();
		
		// Dashboard
		if( current_user_can( 'manage_options' ) ) {
			$html_items[] = '<a href="'.admin_url('index.php').'" title="'.__( 'Visit dashboard', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-dashboard"><span class="sr-only">Dashboard</span></span>', 'textdomain' ).'</a>';
		}
		
		// Network
		if( current_user_can( 'manage_network' ) && is_multisite() ) {
			$html_items[] = '<a href="'.admin_url('network/sites.php').'" title="'.__( 'Manage the network', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-multisite"><span class="sr-only">Dashboard</span></span>', 'textdomain' ).'</a>';
		}	
		
		// Menus
		if( current_user_can( 'edit_theme_options' ) ) {
			$html_items[] = '<a href="'.admin_url('nav-menus.php').'" title="'.__( 'Manage menus', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-menu"><span class="sr-only">Menus</span></span>', 'textdomain' ).'</a>';
		}	

		// Widgets
		if( current_user_can( 'edit_theme_options' ) ) {
			$html_items[] = '<a href="'.admin_url('widgets.php').'" title="'.__( 'manage widgets', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-welcome-widgets-menus"><span class="sr-only">Widgets</span></span>', 'textdomain' ).'</a>';
		}
		
		// Plugins
		if( current_user_can( 'activate_plugins' ) ) {
			$html_items[] = '<a href="'.admin_url('plugins.php').'" title="'.__( 'Manage plugins', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-plugins"><span class="sr-only">Plugins</span></span>', 'textdomain' ).'</a>';
		}

		// Users
		if( current_user_can( 'edit_users' ) ) {
			$html_items[] = '<a href="'.admin_url('users.php').'" title="'.__( 'Manage users', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-admin-users"><span class="sr-only">Users</span></span>', 'textdomain' ).'</a>';
		}

		
		
		
		
		/*
		 * 2. Check if we have any items and if we can edit posts.
		 *    Else showing a menu makes no sense, right?
		 *
		 */
		
		if( count($html_items) > 0 || current_user_can( 'edit_posts' ) ) {
			// begin menu
			echo '<div id="admin-z-mini-menu">';
			
			
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
add_action('wp_footer', 'embed_z_mini_menu');



function z_print_mini_menu_items( $html_items = array() ) {
	foreach($html_items as $item) {
		echo '<div class="z_mini_menu-item">';
		echo $item;
		echo '</div>';
	}
}