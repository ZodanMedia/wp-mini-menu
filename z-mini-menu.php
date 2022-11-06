<?php
/**
 * Plugin Name: Z Mini Admin Menu
 * Contributors: martenmoolenaar
 * Plugin URI: https://speelwei.zodan.nl/wp-mini-menu/
 * Tags: admin menu, tiny menu, mini menu, cleanup, development, elementor
 * Requires at least: 5.5
 * Tested up to: 6.0.2
 * Description: A frontpage mini menu to access most common admin items when te admin bar is not active
 * Version: 1.0.6
 * Author: Zodan
 * Author URI: https://zodan.nl
 * Text Domain: z-mini-admin-menu
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */


// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}




if ( !class_exists( 'zMiniMenu' ) ) {

    // Global variables
    define( 'Z_MINI_ADMIN_MENU_VER', '1.0.1' );
    define( 'Z_MINI_ADMIN_MENU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    define( 'Z_MINI_ADMIN_MENU_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

    $z_mini_menu_defaults = array(
		'use_roles' => array (
            0 => 'administrator'
        )	
	);
    define( 'Z_MINI_ADMIN_MENU_DEFAULTS', $z_mini_menu_defaults );


	// predefines settings
	$z_mini_menu_predefined_items = array();
	$z_mini_menu_predefined_items['use_dashboard'][ 'name' ] = __( 'Visit dashboard', 'z-mini-admin-menu' );
	$z_mini_menu_predefined_items['use_dashboard'][ 'icon' ] = 'dashicons-dashboard';
	$z_mini_menu_predefined_items['use_dashboard'][ 'url' ] = admin_url( 'index.php' );
	$z_mini_menu_predefined_items['use_dashboard'][ 'capability' ] = 'manage_options';
	$z_mini_menu_predefined_items['use_dashboard'][ 'condition' ] = array( '' );

	$z_mini_menu_predefined_items['use_multisite'][ 'name' ] = __('Manage the network', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_multisite'][ 'icon' ] = 'dashicons-admin-multisite';
	$z_mini_menu_predefined_items['use_multisite'][ 'url' ] = admin_url( 'network/sites.php' );
	$z_mini_menu_predefined_items['use_multisite'][ 'capability' ] = 'manage_network';
	$z_mini_menu_predefined_items['use_multisite'][ 'condition' ] = array( 'if_is_multisite' );

	$z_mini_menu_predefined_items['use_add_new'][ 'name' ] = __('Add new', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_add_new'][ 'icon' ] = 'dashicons-plus';
	$z_mini_menu_predefined_items['use_add_new'][ 'url' ] = 'javascript:void()';
	$z_mini_menu_predefined_items['use_add_new'][ 'capability' ] = false;
	$z_mini_menu_predefined_items['use_add_new'][ 'condition' ] = array( '' );
	$z_mini_menu_predefined_items['use_add_new'][ 'has_submenu_items' ] = true;

	$z_mini_menu_predefined_items['use_menus'][ 'name' ] = __('Manage menus', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_menus'][ 'icon' ] = 'dashicons-menu';
	$z_mini_menu_predefined_items['use_menus'][ 'url' ] = admin_url( 'nav-menus.php' );
	$z_mini_menu_predefined_items['use_menus'][ 'capability' ] = 'edit_theme_options';
	$z_mini_menu_predefined_items['use_menus'][ 'condition' ] = array( '' );

	$z_mini_menu_predefined_items['use_widgets'][ 'name' ] = __('Manage widgets', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_widgets'][ 'icon' ] = 'dashicons-index-card';
	$z_mini_menu_predefined_items['use_widgets'][ 'url' ] = admin_url( 'widgets.php' );
	$z_mini_menu_predefined_items['use_widgets'][ 'capability' ] = 'edit_theme_options';
	$z_mini_menu_predefined_items['use_widgets'][ 'condition' ] = array( '' );

	$z_mini_menu_predefined_items['use_plugins'][ 'name' ] = __('Manage plugins', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_plugins'][ 'icon' ] = 'dashicons-admin-plugins';
	$z_mini_menu_predefined_items['use_plugins'][ 'url' ] = admin_url( 'plugins.php' );
	$z_mini_menu_predefined_items['use_plugins'][ 'capability' ] = 'activate_plugins';
	$z_mini_menu_predefined_items['use_plugins'][ 'condition' ] = array( '' );

	$z_mini_menu_predefined_items['use_users'][ 'name' ] = __('Manage users', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_users'][ 'icon' ] = 'dashicons-admin-users';
	$z_mini_menu_predefined_items['use_users'][ 'url' ] = admin_url( 'users.php' );
	$z_mini_menu_predefined_items['use_users'][ 'capability' ] = 'edit_users';
	$z_mini_menu_predefined_items['use_users'][ 'condition' ] = array( '' );

	$z_mini_menu_predefined_items['use_woocommerce'][ 'name' ] = __('Manage WooCommerce', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_woocommerce'][ 'icon' ] = 'dashicons-cart';
	$z_mini_menu_predefined_items['use_woocommerce'][ 'url' ] = admin_url( 'admin.php?page=wc-admin' );
	$z_mini_menu_predefined_items['use_woocommerce'][ 'capability' ] = 'manage_woocommerce';
	$z_mini_menu_predefined_items['use_woocommerce'][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

	$z_mini_menu_predefined_items['use_woo_products'][ 'name' ] = __('Manage Products', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_woo_products'][ 'icon' ] = 'dashicons-screenoptions';
	$z_mini_menu_predefined_items['use_woo_products'][ 'url' ] = admin_url( 'edit.php?post_type=product' );
	$z_mini_menu_predefined_items['use_woo_products'][ 'capability' ] = 'edit_products';
	$z_mini_menu_predefined_items['use_woo_products'][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

	$z_mini_menu_predefined_items['use_fforms'][ 'name' ] = __('Fluent Forms', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_fforms'][ 'svg' ] = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiAjYTdhYWFkO308L3N0eWxlPjwvZGVmcz48dGl0bGU+ZGFzaGJvYXJkX2ljb248L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJMYXllcl8xLTIiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTUuNTcsMEg0LjQzQTQuNDMsNC40MywwLDAsMCwwLDQuNDNWMTUuNTdBNC40Myw0LjQzLDAsMCwwLDQuNDMsMjBIMTUuNTdBNC40Myw0LjQzLDAsMCwwLDIwLDE1LjU3VjQuNDNBNC40Myw0LjQzLDAsMCwwLDE1LjU3LDBaTTEyLjgyLDE0YTIuMzYsMi4zNiwwLDAsMS0xLjY2LjY4SDYuNUEyLjMxLDIuMzEsMCwwLDEsNy4xOCwxM2EyLjM2LDIuMzYsMCwwLDEsMS42Ni0uNjhsNC42NiwwQTIuMzQsMi4zNCwwLDAsMSwxMi44MiwxNFptMy4zLTMuNDZhMi4zNiwyLjM2LDAsMCwxLTEuNjYuNjhIMy4yMWEyLjI1LDIuMjUsMCwwLDEsLjY4LTEuNjQsMi4zNiwyLjM2LDAsMCwxLDEuNjYtLjY4SDE2Ljc5QTIuMjUsMi4yNSwwLDAsMSwxNi4xMiwxMC41M1ptMC0zLjczYTIuMzYsMi4zNiwwLDAsMS0xLjY2LjY4SDMuMjFhMi4yNSwyLjI1LDAsMCwxLC42OC0xLjY0LDIuMzYsMi4zNiwwLDAsMSwxLjY2LS42OEgxNi43OUEyLjI1LDIuMjUsMCwwLDEsMTYuMTIsNi44MVoiLz48L2c+PC9nPjwvc3ZnPg==';
	$z_mini_menu_predefined_items['use_fforms'][ 'url' ] = admin_url( 'admin.php?page=fluent_forms' );
	$z_mini_menu_predefined_items['use_fforms'][ 'capability' ] = 'fluentform_forms_manager';
	$z_mini_menu_predefined_items['use_fforms'][ 'condition' ] = array( 'if_function_exists', 'wpFluentForm' );

	$z_mini_menu_predefined_items['use_wpseo'][ 'name' ] = __('Manage Yoast SEO', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_wpseo'][ 'svg' ] = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJlbGVtIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB3aWR0aD0iMTc0cHgiIGhlaWdodD0iMTc0cHgiIHZpZXdCb3g9IjAgMCAxNzQgMTc0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNzQgMTc0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNTIuOCw1Ni4xYzAtMTItOS4zLTIyLTIxLjEtMjMuMWw4LjktMjMuOEgxMTJsLTguNSwyMy43SDQ0LjRjLTEyLjgsMC0yMy4yLDEwLjQtMjMuMiwyMy4ydjYxLjcKCWMwLDEyLjgsMTAuNCwyMy4yLDIzLjIsMjMuMmg5LjdjLTAuNCwwLjEtMC44LDAuMS0xLjIsMC4ybC0yLjIsMC4zdjIzLjJoMi41YzE3LjksMCwyOC44LTksMzctMjMuN2g2Mi42VjU2LjF6IE01NS44LDE1OS42di0xMy43CgljMTEuNS0yLjMsMTUuNy05LjUsMTgtMTUuNmMyLjMtNS45LDIuMy0xMi40LDAtMTguM0w1MC45LDUzLjFINjdsMTYuMyw1MC45bDMyLjMtODkuOGgxNy43TDk0LjEsMTE5LjQKCUM4NC4xLDE0Ny41LDczLjUsMTU4LjcsNTUuOCwxNTkuNnoiLz4KPC9zdmc+Cg==';
	$z_mini_menu_predefined_items['use_wpseo'][ 'url' ] = admin_url( 'admin.php?page=wpseo_dashboard' );
	$z_mini_menu_predefined_items['use_wpseo'][ 'capability' ] = 'wpseo_manage_options';
	$z_mini_menu_predefined_items['use_wpseo'][ 'condition' ] = array( 'if_class_exists', 'WPSEO_Options' );

	$z_mini_menu_predefined_items['use_acf'][ 'name' ] = __('Manage ACF', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_acf'][ 'icon' ] = 'dashicons-welcome-widgets-menus';
	$z_mini_menu_predefined_items['use_acf'][ 'url' ] = admin_url( 'edit.php?post_type=acf-field-group' );
	$z_mini_menu_predefined_items['use_acf'][ 'capability' ] = 'manage_options';
	$z_mini_menu_predefined_items['use_acf'][ 'condition' ] = array( 'if_class_exists', 'ACF' );

	$z_mini_menu_predefined_items['use_wpml'][ 'name' ] = __('Manage WPML', 'z-mini-admin-menu');
	$z_mini_menu_predefined_items['use_wpml'][ 'image' ] = plugins_url('/sitepress-multilingual-cms/res/img/icon16.png');
	$z_mini_menu_predefined_items['use_wpml'][ 'url' ] = admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' );
	$z_mini_menu_predefined_items['use_wpml'][ 'capability' ] = 'wpml_manage_woocommerce_multilingual';
	$z_mini_menu_predefined_items['use_wpml'][ 'condition' ] = array( 'if_function_exists', 'icl_object_id' );

	// All custom items
	$options = get_option( 'z_mini_menu_plugin_options' );
	if ( !empty( $options[ 'use_custom' ] ) ) {
		foreach ( $options[ 'use_custom' ] as $key => $custom_item ) {
			$z_mini_menu_predefined_items['use_custom'][$key] = $custom_item;
		}
	}




    // Add link to settings page on plugin overview
    if ( !function_exists( 'z_mini_menu_settings_link' ) ) {
        function z_mini_menu_settings_link( $links ) {
            $settings_link = '<a href="options-general.php?page=z_mini_menu_plugin">' . __( 'Settings' ) . '</a>';
            array_unshift( $links, $settings_link );
            return $links;
        }
        $z_mini_menu_basename = plugin_basename( __FILE__ );
        add_filter( "plugin_action_links_" . $z_mini_menu_basename, 'z_mini_menu_settings_link' );
    }


    /**
     * Main class zMiniMenu
     *
     *
     */
    class zMiniMenu {

        public static function show_z_mini_menu() {
            // Enqueue assets
            add_action( 'wp_footer', array( __CLASS__, 'z_mini_menu_enqueue_assets' ) );

            // Add the Mini Menu after content or in the footer
            $options = get_option( 'z_mini_menu_plugin_options' );

            if ( isset( $options[ 'use_after_main' ] ) && $options[ 'use_after_main' ]['checked'] == 1 ) {
                add_action( 'after_main', array( __CLASS__, 'embed_z_mini_menu' ) );
            } else {
                add_action( 'wp_footer', array( __CLASS__, 'embed_z_mini_menu' ) );
            }

        }


        public static function z_mini_menu_enqueue_assets() {
            wp_enqueue_style( 'z-mini-menu-css', Z_MINI_ADMIN_MENU_PLUGIN_URL . 'inc/style.css', array( 'dashicons' ), Z_MINI_ADMIN_MENU_VER );
            wp_register_script( 'z-mini-menu-js', Z_MINI_ADMIN_MENU_PLUGIN_URL . 'inc/scripts.js', array( 'jquery' ), Z_MINI_ADMIN_MENU_VER, true );
            wp_enqueue_script( 'z-mini-menu-js' );
        }


        public static function z_print_mini_menu_items( $html_items = array() ) {
            // Function to output the items
            foreach ( $html_items as $item ) {

				$has_submenu_class = '';

				// check on condition of item
				if( !empty($item['condition']) ) {
					if ( $item['condition'][0] == 'if_class_exists' && !class_exists( $item['condition'][1] ) ) {
						continue;
					}
					if ( $item['condition'][0] == 'if_function_exists' && !function_exists( $item['condition'][1] ) ) {
						continue;
					}
					if ( $item['condition'][0] == 'if_is_multisite' && !is_multisite() ) {
						continue;
					}
				}

				// check for possible capabilities for the user
				if( !empty($item['capability']) ) {
					$continue = false;
					if( current_user_can($item['capability'])) {
						$continue = true;
					}
					if(!$continue) {
						continue;
					}
				}

				// check for possible role restriction for the user
				if( !empty($item['role']) ) {
					$continue = false;
					if( z_mini_menu_user_has_role( $item['role'] ) ) {
						$continue = true;
					}
					if(!$continue) {
						continue;
					}
				}				
				
				// proces use_add_new
				// Add new posts/pages/CPTs, get all public post types
				if( !empty($item['has_submenu_items']) ) {
					$has_submenu_class = ' has-submenu';
					$html_add_new_items = array();
					$post_args = array( 'public' => true );
					$output = 'objects';
					$operator = 'and';
					$post_types = get_post_types( $post_args, $output, $operator );

					foreach ( $post_types as $post_type ) {
						$pto = get_post_type_object( $post_type->name ); // determine caps
						$edit_posts_cap = $pto->cap->edit_posts;
						if ( current_user_can( $edit_posts_cap ) ) { // if current user can, add the new item link
							$subitem = array();
							$subitem['url'] = admin_url( 'post-new.php?post_type=' . $post_type->name );
							$subitem['label'] =$post_type->labels->singular_name;
							$html_add_new_items[] = $subitem;
						}
					}
					if( empty($html_add_new_items) ) {
						continue;
					}
				}


                echo '<div class="z_mini_menu-item' . esc_attr($has_submenu_class) . '">';
                echo '<a href="' . esc_url($item['url']) . '" title="' . esc_attr( $item['name'] ) . '">';

				if( !empty($item['icon']) ) { // if the item has a dashicon
					echo '<span class="dashicons-before ' . esc_attr($item['icon']) . '">';

				} elseif( !empty($item['svg']) ) {
					echo '<span class="icon svg" style="background-image:url('.esc_attr($item['svg']).') !important;">';

				} elseif( !empty($item['image']) ) {
					echo '<span class="icon image"><img src="' . esc_url($item['image']) .'" alt="">';

				} else {
					echo '<span class="dashicons-before dashicons-smiley">';
				}

				echo '<span class="sr-only">' . esc_attr( $item['name'] ) . '</span></span></a>';

				if( !empty($item['has_submenu_items']) && !empty($html_add_new_items) ) {
					echo '<ul class="fold-out-sub">';
					foreach($html_add_new_items as $subitem) {
						echo '<li><a href="' . esc_url($subitem['url']) . '">' . esc_html($subitem['label']) . '</a></li>';
					}
					echo '</ul>';
				}
                echo '</div>';
            }
        }





        // Embedding the Mini Menu
        public static function embed_z_mini_menu() {
			global $z_mini_menu_predefined_items;
					
			$options = wp_parse_args( get_option( 'z_mini_menu_plugin_options' ), Z_MINI_ADMIN_MENU_DEFAULTS );

            // only do stuff when
            // - we're not on the admin panel and
            // - the admin bar is not already showing
//            if ( is_user_logged_in() && !is_admin() && !is_admin_bar_showing() && !current_user_can( 'subscriber' ) ) {
            if ( is_user_logged_in() && !is_admin() && !is_admin_bar_showing() && z_mini_menu_user_has_roles($options['use_roles']) ) {

                /*
                 * Start the menu always with an edit post link (if we can), but let's
                 * 1.a. Make an array of extra menu items we can possibly show
				 * 1.b. Order them by save menu order
				 * 1.c. Get the values from $z_mini_menu_predefined_items;
                 *
                 */
				
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
					if( $key == 'bg_color' || $key == 'use_after_main' || $key == 'use_roles' ) {
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

				$ordered_items_with_values = array();
				foreach($ordered_options as $key => $option) {
					if( !is_numeric($option)) {
						$ordered_items_with_values[] = $z_mini_menu_predefined_items[$option];
					} else {
						$ordered_items_with_values[] = $z_mini_menu_predefined_items['use_custom'][$option];
					}
				}



				// we always show the link to the Dashboard first
                if ( current_user_can( 'manage_options' ) ) {
					$dashboard_item = $z_mini_menu_predefined_items['use_dashboard'];
					array_unshift($ordered_items_with_values, $dashboard_item);
                }

                // we always show the logout link at the end
				$logout_item = array();
				$logout_item['name'] = __( 'Logout', 'z-mini-admin-menu' );
				$logout_item['icon'] = 'dashicons-exit flipped';
				$logout_item['url'] = wp_logout_url();
				$logout_item['capability'] = false;
				$logout_item['condition'] = array('');
				array_push($ordered_items_with_values, $logout_item);



                /*
                 * 2. Check if we have any items and if we can edit posts.
                 *    Else showing a menu makes no sense, right?
                 *
                 */

                if ( count( $ordered_items_with_values ) > 0 || current_user_can( 'edit_posts' ) ) {
                    // begin menu
                    $bg_color = '#000';
                    if ( !empty( $options[ 'bg_color' ] ) ) {
						$bg_color = $options[ 'bg_color' ];
                    }
                    echo '<div id="admin-z-mini-menu" data-barba-prevent="all" style="background-color:'. esc_attr($bg_color) .';">';

                    // Add edit link
                    if ( current_user_can( 'edit_posts' ) ) {
                        edit_post_link( '<span class="dashicons-before dashicons-edit-large"><span class="sr-only">'.esc_html__( 'Edit', 'z-mini-admin-menu' ).'</span></span>', '<div class="z_mini_menu-item">', '</div>', null, 'btn-edit-post-link' );


						// Add 'Edit with Elementor' if Elementor is available and post can be edited with elementor
						$elementor_url = z_mini_menu_get_elementor_edit_link();
						$elementor_svg = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJlbGVtIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB3aWR0aD0iMTc0cHgiIGhlaWdodD0iMTc0cHgiIHZpZXdCb3g9IjAgMCAxNzQgMTc0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNzQgMTc0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik04NywwQzM5LDAsMCwzOSwwLDg3czM5LDg3LDg3LDg3czg3LTM5LDg3LTg3UzEzNSwwLDg3LDB6IE02MywxMjcuM0g0N1Y0Ny40aDE2VjEyNy4zeiBNMTI3LDEyNy4zSDc5di0xNmg0OAoJVjEyNy4zeiBNMTI3LDk1LjNINzl2LTE2aDQ4Vjk1LjN6IE0xMjcsNjMuM0g3OXYtMTZoNDhWNjMuM3oiLz4KPC9zdmc+Cg==';
						if( !empty($elementor_url) ) {
							echo '<div class="z_mini_menu-item"><a href="' . esc_url($elementor_url) . '" title="' . esc_attr__( 'Edit with Elementor', 'z-mini-admin-menu' ) . '"><span class="icon svg" style="background-image:url('.esc_attr($elementor_svg).') !important;"><span class="sr-only">' . esc_attr__( 'Edit with Elementor', 'z-mini-admin-menu' ) . '</span></span></a></div>';
						}


                    }

                    if ( count( $ordered_items_with_values ) > 1 ) {
                        // Make menu expandable
                        echo '<div class="z_mini_menu-item expand">';
                        echo '<a href="#z-mini-menu-expanded" id="expand-z-mini-menu" title="' . esc_attr__( 'Expand mini menu', 'z-mini-admin-menu' ) . '"><span class="dashicons-before dashicons-ellipsis"><span class="sr-only">' . esc_html__( 'Expand mini menu', 'z-mini-admin-menu' ) . '</span></span></a>';
                        echo '</div>';

                        echo '<div class="z_mini_menu-item-holder">';
                        self::z_print_mini_menu_items( $ordered_items_with_values );
                        echo '</div>';

                        echo '<div class="z_mini_menu-item collapse">';
                        echo '<a href="#z-mini-menu-collapsed" id="collapse-z-mini-menu" title="' . esc_attr__( 'Collapse mini menu', 'z-mini-admin-menu' ) . '"><span class="dashicons-before dashicons-ellipsis"><span class="sr-only">' . esc_html__( 'Collapse mini menu', 'z-mini-admin-menu' ) . '</span></span></a>';
                        echo '</div>';


                    } else {
                        self::z_print_mini_menu_items( $ordered_items_with_values );
                    }

                    // end menu
                    echo '</div>';
                }
            }
        }
    }

    zMiniMenu::show_z_mini_menu();
}

function z_mini_menu_get_elementor_edit_link() {
		// if accidently called on admin page, bail out
		if( is_admin() ) {
			return false;
		}
		// if on search page, bail out
		if( is_search() ) {
			return false;
		}
		// if elementor is not loaded, bail out
		if( !did_action( 'elementor/loaded' ) ) { 
			return false;
		}
		
		// Get current post/screen parameters
		global $post;
		$post_id = $post->ID;
		$post_type = $post->post_type;

		$post_types_for_elementor = array(
			'page',
			'post',
			'elementor_library',
		);
		// When we are on a specified post type screen
		if ( in_array( $post_type, $post_types_for_elementor ) ) {
			// Build the Elementor editor link
			$elementor_editor_link = admin_url( 'post.php?post=' . $post_id . '&action=elementor' );
			return $elementor_editor_link;
		} else {
			return false;
		}

}


function z_mini_menu_user_has_role( $role = false ) {
	if( empty($role) ) { return false; }
	$user = wp_get_current_user();
	if( in_array( $role, (array) $user->roles ) ) {
		return true;
	} else {
		return false;
	}
}
function z_mini_menu_user_has_roles( $roles = false ){
	if( empty($roles) ) { return false; }
	$user = wp_get_current_user();
	
	if( is_array($roles) ) {
		if( !empty( array_intersect( $roles, (array) $user->roles ) ) ) {
			return true;
		} else {
			return false;
		}	
	} else {
		// fallback
		z_mini_menu_user_has_role( $roles );
	}
} 




if ( is_admin() ) {
    // Include the admin functions
    include( Z_MINI_ADMIN_MENU_PLUGIN_PATH . '/admin.php' );
}
