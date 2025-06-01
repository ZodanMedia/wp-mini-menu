<?php
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
			// due to the scope of @font-face, we need to load th dashicons in 
			// both the light DOM and shadow DOM
            wp_enqueue_style( 'dashicons');
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

				echo '<span class="sr-only">' . esc_attr( $item['name'] ) . '</span></span>';
				
				$use_dashboard = true;
				// include admin update functions	
				if( current_user_can('update_core') ) {

					if( !empty($item['id']) && $item['id'] == 'use_dashboard' && !empty($use_dashboard) ) {
						require_once( ABSPATH . 'wp-admin/includes/update.php' );
						require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						if( function_exists('get_plugin_updates') ) {
							// $core_updates = get_core_updates(array('available'));
							$plugin_updates = get_plugin_updates();
							$theme_updates = get_theme_updates();
							$no_updates = !empty($core_updates) ? count($core_updates) : 0;
							$no_updates += !empty($plugin_updates) ? count($plugin_updates) : 0;
							$no_updates += !empty($theme_updates) ? count($theme_updates) : 0;
							if( $no_updates > 0 ) {
								echo '<span class="z-mini-admin-menu-badge">'.esc_html($no_updates).'</span>';
							}
						}				
					}
				}
				echo '</a>';

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

            if ( is_user_logged_in() && !is_admin() && ( empty($options['when_to_show']) || ( !is_admin_bar_showing() && !empty($options['when_to_show']) ) ) && self::user_has_roles($options['use_roles']) ) {
				
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
					
					
					
					// 2a. The custom element
					echo '<z-mini-menu></z-mini-menu>';
				
					// 2b. Create the template
					echo '<template id="z-mini-menu-template">';
				
					// 2c. Output the actual menu-items
                    echo '<div id="admin-z-mini-menu" data-barba-prevent="all" style="background-color:'. esc_attr($bg_color) .';">';

                    // Add edit link
                    if ( current_user_can( 'edit_posts' ) ) {
						$edit_post_url = get_edit_post_link();
						
						echo '<div class="z_mini_menu-item"><a class="btn-edit-post-link" href="'.esc_url($edit_post_url).'"><span class="dashicons-before dashicons-edit-large"><span class="sr-only">'.esc_html__( 'Edit', 'z-mini-admin-menu' ).'</span></span></a></div>';


						// Add 'Edit with Elementor' if Elementor is available and post can be edited with elementor
						$elementor_url = self::get_elementor_edit_link();
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
                    // end 2.c menu
                    echo '</div>';
					
					// 2d. Include dashicons
					echo '<link rel="stylesheet" id="dashicons-css" href="'.esc_url(site_url()).'/wp-includes/css/dashicons.min.css"  media="all" />';
					
					// 2e. Include the minified stylesheet
					echo '<style>#admin-z-mini-menu{position:fixed;z-index:9999;top:150px;left:0;display:flex;flex-direction:column;justify-content:space-between;align-content:center;align-items:center;width:40px;height:auto;border-radius:0 5px 5px 0;background:#000}#admin-z-mini-menu .z_mini_menu-item-holder{display:none}#admin-z-mini-menu.open .z_mini_menu-item-holder{display:flex;flex-direction:column;justify-content:space-between;align-content:center;align-items:center;width:40px;height:auto}#admin-z-mini-menu .z_mini_menu-item{width:40px;height:40px;background:transparent;display:flex;justify-content:center;align-content:center;align-items:center;position:relative}#admin-z-mini-menu .z_mini_menu-item a{display:block;position:relative;font-size:16px;line-height:16px;text-decoration:none;transition:all 250ms ease-in-out;color:#ffffff90;color:#fff;opacity:.65}#admin-z-mini-menu .z_mini_menu-item a:hover{text-decoration:none;color:#fff;opacity:1}#admin-z-mini-menu .z_mini_menu-item.collapse,#admin-z-mini-menu.open .z_mini_menu-item.expand{display:none}#admin-z-mini-menu.open .z_mini_menu-item.collapse{display:flex}#admin-z-mini-menu ul.fold-out-sub{list-style:none;padding-left:0;position:absolute;background:#000;left:40px;top:0;border-radius:0 5px 5px 0;display:none}#admin-z-mini-menu .has-submenu:hover ul.fold-out-sub{display:block}#admin-z-mini-menu ul.fold-out-sub li{list-style:none;margin:0;padding:0}#admin-z-mini-menu ul.fold-out-sub li a{padding:6px 16px 6px 12px;font-size:13px;;line-height:16px;}#admin-z-mini-menu .dashicons-before.flipped::before{transform:rotate(180deg)}#admin-z-mini-menu .z_mini_menu-item a .icon.image,#admin-z-mini-menu .z_mini_menu-item a .icon.svg{display:inline-block;width:20px;height:20px;background-repeat:no-repeat;background-position:center;background-size:20px auto}#admin-z-mini-menu .sr-only{border:0;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal}.z-mini-admin-menu-badge{position:absolute;display:inline-block;vertical-align:top;box-sizing:border-box;margin:-8px 0 0 -1px;padding:0 5px;min-width:18px;height:18px;border-radius:9px;background-color:#d63638;color:#fff;font-size:11px;line-height:1.6;text-align:center;z-index: 26;}</style>';
					
					// end 2c. end template
					echo '</template>';
					
					// 2f. Include the JavaScript
					echo '<script>customElements.define("z-mini-menu",class extends HTMLElement{constructor(){super();let template=document.getElementById("z-mini-menu-template");let templateContent=template.content;const shadowRoot=this.attachShadow({mode:"open"});shadowRoot.appendChild(templateContent.cloneNode(true));shadowRoot.getElementById("expand-z-mini-menu").addEventListener("click",(event)=>{event.preventDefault();shadowRoot.getElementById("admin-z-mini-menu").classList.add("open")});shadowRoot.getElementById("collapse-z-mini-menu").addEventListener("click",(event)=>{event.preventDefault();shadowRoot.getElementById("admin-z-mini-menu").classList.remove("open")})}});</script>';

                }
            }
        }


		public static function user_has_role( $role = false ) {
			if( empty($role) ) { return false; }
			$user = wp_get_current_user();
			if( in_array( $role, (array) $user->roles ) ) {
				return true;
			} else {
				return false;
			}
		}




		public static function user_has_roles( $roles = false ){
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
				self::user_has_role( $roles );
			}
		} 




		public static function get_elementor_edit_link() {
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


    }
