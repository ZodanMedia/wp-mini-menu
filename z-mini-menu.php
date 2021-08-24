<?php
/**
 * Plugin Name: Z Mini Admin Menu
 * Contributors:
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 * Tags:
 * Requires at least: 5.5
 * Tested up to: 5.7.1
 * Description: A mini menu to access most common admin items when te admin bar is not active
 * Version: 0.0.7
 * Author: Zodan
 * Author URI: https://zodan.nl
 * Text Domain: z-mini-menu
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */



// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}





if ( !class_exists( 'zMiniMenu' ) ) {
	
	// Global variables
	define('Z_MINI_MENU_VER', '0.0.6');
	define('Z_MINI_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ));
	define('Z_MINI_MENU_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

	$z_mini_menu_defaults = array();
	define('Z_MINI_MENU_DEFAULTS', $z_mini_menu_defaults);

	
	
	
	// Add link to settings page on plugin overview
	if ( !function_exists( 'z_mini_menu_settings_link' ) ) {
		function z_mini_menu_settings_link($links) { 
			$settings_link = '<a href="options-general.php?page=z_mini_menu_plugin">'.__( 'Settings' ) . '</a>'; 
			array_unshift($links, $settings_link); 
			return $links; 
		}
		$z_mini_menu_basename = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_" . $z_mini_menu_basename, 'z_mini_menu_settings_link' );
	}	
	
	

	
	
	
	
	
	/**
	 * Main class zMiniMenu
	 * 
	 * 
	 */
    class zMiniMenu {
		
		public static function show_z_mini_menu() {
			// Enqueue assets
			add_action('wp_footer', array( __CLASS__, 'z_mini_menu_enqueue_assets' ) );
			
			// Add the Mini Menu after content or in the footer
			$options = get_option( 'z_mini_menu_plugin_options' );
			
			if( isset($options['use_after_main']) && $options['use_after_main'] == 1 ) {
				add_action('after_main', array( __CLASS__, 'embed_z_mini_menu' ) );
			} else {
				add_action('wp_footer', array( __CLASS__, 'embed_z_mini_menu' ) );
			}

		}
		
		
		public static function z_mini_menu_enqueue_assets() {
			wp_enqueue_style( 'z-mini-menu-css', Z_MINI_MENU_PLUGIN_URL . 'inc/style.css', array('dashicons'), Z_MINI_MENU_VER );

			wp_register_script( 'z-mini-menu-js', Z_MINI_MENU_PLUGIN_URL . 'inc/scripts.js', array('jquery'), Z_MINI_MENU_VER, true );
			wp_enqueue_script( 'z-mini-menu-js' );
		}
		
		
		public static function z_print_mini_menu_items( $html_items = array() ) {
			// Function to output the items
			foreach($html_items as $item) {
				$has_submenu = '';
				if (strpos($item, 'has-children') !== false) {
					$has_submenu = ' has-submenu';
				}
				echo '<div class="z_mini_menu-item'.$has_submenu.'">';
				echo $item;
				echo '</div>';
			}
		}
		
		
		// Main function embedding the Mini Menu
		public static function embed_z_mini_menu() {
			
			// only do stuff when
			// - we're not on the admin panel and
			// - the admin bar is not already showing
			if( is_user_logged_in() && !is_admin() && !is_admin_bar_showing() && !current_user_can('subscriber') ) {

				/*
				 * Start the menu always with an edit post link (if we can), but let's 
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

				// Add new posts/pages/CPTs
				if( isset($options['use_add_new']) && $options['use_add_new'] == 1 ) {
					$html_add_new_items = array();
					// Get all public post types
					$post_args = array( 'public'	=> true );
					$output =  'objects';
					$operator = 'and';
					$post_types = get_post_types( $post_args, $output,  $operator )	;

					foreach( $post_types as $post_type) {
						// determine caps
						$pto      = get_post_type_object( $post_type->name );						
						$edit_posts_cap = $pto->cap->edit_posts;
						// if current user can, add the new item link
						if(current_user_can( $edit_posts_cap) ) {
							$new_url = admin_url('post-new.php?post_type=' . $post_type->name);
							$label = $post_type->labels->singular_name;
							$html_add_new_items[] = '<li><a href="' . $new_url . '">' . $label . '</a></li>';
						}
					}

					if( !empty($html_add_new_items) ) {
						$html_add_new = '<ul class="fold-out-sub">';
						foreach( $html_add_new_items as $item ) {
							$html_add_new .= $item;
						}
						$html_add_new .= '</ul>';

						$html_items[] = '<a class="has-children" href="javascript:void();" title="'.__( 'Add new', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-plus"><span class="sr-only">Add new</span></span>', 'textdomain' ).'</a>' . $html_add_new;
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

				// WP SEO (Yoast)
				if ( class_exists( 'WPSEO_Options' ) && (current_user_can( 'manage_options' ) || current_user_can( 'wpseo_manage_options' ) || current_user_can( 'wpseo_edit_advanced_metadata' ) ) ) {
					if( isset($options['use_wpseo']) && $options['use_wpseo'] == 1 ) {
						$html_items[] = '<a href="'.admin_url('admin.php?page=wpseo_dashboard').'" title="'.__( 'Manage Yoast SEO', 'textdomain' ).'">'.__( '<span class="icon svg" style="background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2E3YWFhZCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHJvbGU9ImltZyIgYXJpYS1oaWRkZW49InRydWUiIGZvY3VzYWJsZT0iZmFsc2UiPjxnPjxnPjxnPjxnPjxwYXRoIGQ9Ik0yMDMuNiwzOTVjNi44LTE3LjQsNi44LTM2LjYsMC01NGwtNzkuNC0yMDRoNzAuOWw0Ny43LDE0OS40bDc0LjgtMjA3LjZIMTE2LjRjLTQxLjgsMC03NiwzNC4yLTc2LDc2VjM1N2MwLDQxLjgsMzQuMiw3Niw3Niw3NkgxNzNDMTg5LDQyNC4xLDE5Ny42LDQxMC4zLDIwMy42LDM5NXoiLz48L2c+PGc+PHBhdGggZD0iTTQ3MS42LDE1NC44YzAtNDEuOC0zNC4yLTc2LTc2LTc2aC0zTDI4NS43LDM2NWMtOS42LDI2LjctMTkuNCw0OS4zLTMwLjMsNjhoMjE2LjJWMTU0Ljh6Ii8+PC9nPjwvZz48cGF0aCBzdHJva2Utd2lkdGg9IjIuOTc0IiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGQ9Ik0zMzgsMS4zbC05My4zLDI1OS4xbC00Mi4xLTEzMS45aC04OS4xbDgzLjgsMjE1LjJjNiwxNS41LDYsMzIuNSwwLDQ4Yy03LjQsMTktMTksMzcuMy01Myw0MS45bC03LjIsMXY3Nmg4LjNjODEuNywwLDExOC45LTU3LjIsMTQ5LjYtMTQyLjlMNDMxLjYsMS4zSDMzOHogTTI3OS40LDM2MmMtMzIuOSw5Mi02Ny42LDEyOC43LTEyNS43LDEzMS44di00NWMzNy41LTcuNSw1MS4zLTMxLDU5LjEtNTEuMWM3LjUtMTkuMyw3LjUtNDAuNywwLTYwbC03NS0xOTIuN2g1Mi44bDUzLjMsMTY2LjhsMTA1LjktMjk0aDU4LjFMMjc5LjQsMzYyeiIvPjwvZz48L2c+PC9zdmc+) !important;"><span class="sr-only">Manage Yoast SEO</span></span>', 'textdomain' ).'</a>';
					}
				}

				// ACF
				if ( class_exists( 'ACF' ) && current_user_can( 'manage_options' ) ) {
					if( isset($options['use_acf']) && $options['use_acf'] == 1 ) {
						$html_items[] = '<a href="'.admin_url('edit.php?post_type=acf-field-group').'" title="'.__( 'Manage ACF', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-welcome-widgets-menus"><span class="sr-only">Manage ACF</span></span>', 'textdomain' ).'</a>';
					}
				}
				
				// WPML
				if ( function_exists( 'icl_object_id' ) && current_user_can( 'manage_options' ) ) {
					if( isset($options['use_wpml']) && $options['use_wpml'] == 1 ) {
						$html_items[] = '<a href="'.admin_url('admin.php?page=sitepress-multilingual-cms/menu/languages.php').'" title="'.__( 'Manage WPML', 'textdomain' ).'">'.__( '<span class="icon image"><img src="'.plugins_url().'/sitepress-multilingual-cms/res/img/icon16.png" alt=""><span class="sr-only">Manage WPML</span></span>', 'textdomain' ).'</a>';
					}
				}

				
				
				// custom items
				if( !empty($options['use_custom']) ) {
					foreach($options['use_custom'] as $custom_item) {
						$html_items[] = '<a href="'.$custom_item['url'].'" title="'.$custom_item['name'].'"><span class="dashicons-before '.$custom_item['icon'].'"><span class="sr-only">'.$custom_item['name'].'</span></span></a>';
					}
				}
				
				
				// Logout
				$html_items[] = '<a href="'.wp_logout_url().'" title="'.__( 'Logout', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-exit flipped"><span class="sr-only">Logout</span></span>', 'textdomain' ).'</a>';



				/*
				 * 2. Check if we have any items and if we can edit posts.
				 *    Else showing a menu makes no sense, right?
				 *
				 */

				if( count($html_items) > 0 || current_user_can( 'edit_posts' ) ) {
					// begin menu
					
					$options = wp_parse_args(get_option( 'z_mini_menu_plugin_options'), Z_MINI_MENU_DEFAULTS );
					$styles = '';
					if( !empty($options['bg_color']) ) {
						$styles = ' style="background-color:'.$options['bg_color'].';"';
					}
					echo '<div id="admin-z-mini-menu" data-barba-prevent="all"'.$styles.'>';

					// Add edit link
					if( current_user_can( 'edit_posts' ) ) {
						edit_post_link( __( '<span class="dashicons-before dashicons-edit-large"><span class="sr-only">Edit</span></span>', 'textdomain' ), '<div class="z_mini_menu-item">', '</div>', null, 'btn-edit-post-link' );
					}	

					if( count($html_items) > 1 ) {
						// Make menu expandable
						echo '<div class="z_mini_menu-item expand">';
						echo '<a href="#z-mini-menu-expanded" id="expand-z-mini-menu" title="'.__( 'Expand mini menu', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-ellipsis"><span class="sr-only">Expand mini menu</span></span>', 'textdomain' ).'</a>';
						echo '</div>';

						echo '<div class="z_mini_menu-item-holder">';
						self::z_print_mini_menu_items($html_items);
						echo '</div>';

						echo '<div class="z_mini_menu-item collapse">';
						echo '<a href="#z-mini-menu-collapsed" id="collapse-z-mini-menu" title="'.__( 'Collapse mini menu', 'textdomain' ).'">'.__( '<span class="dashicons-before dashicons-ellipsis"><span class="sr-only">Expand mini menu</span></span>', 'textdomain' ).'</a>';
						echo '</div>';


					} else {
						self::z_print_mini_menu_items($html_items);
					}

					// end menu
					echo '</div>';
				}	
			}	
		}
    }

    zMiniMenu::show_z_mini_menu();
}





if ( is_admin() ) {
	// Include the admin functions
	include(Z_MINI_MENU_PLUGIN_PATH . '/admin.php');
}
