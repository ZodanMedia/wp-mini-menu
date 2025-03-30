<?php

// predefines settings
$z_mini_menu_predefined_items = array();
$z_mini_menu_predefined_items['use_dashboard'][ 'id' ] = 'use_dashboard';
$z_mini_menu_predefined_items['use_dashboard'][ 'name' ] = __( 'Visit dashboard', 'z-mini-admin-menu' );
$z_mini_menu_predefined_items['use_dashboard'][ 'icon' ] = 'dashicons-dashboard';
$z_mini_menu_predefined_items['use_dashboard'][ 'url' ] = admin_url( 'index.php' );
$z_mini_menu_predefined_items['use_dashboard'][ 'capability' ] = false;
$z_mini_menu_predefined_items['use_dashboard'][ 'condition' ] = array( '' );

$z_mini_menu_predefined_items['use_multisite'][ 'id' ] = 'use_multisite';
$z_mini_menu_predefined_items['use_multisite'][ 'name' ] = __('Manage the network', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_multisite'][ 'icon' ] = 'dashicons-admin-multisite';
$z_mini_menu_predefined_items['use_multisite'][ 'url' ] = admin_url( 'network/sites.php' );
$z_mini_menu_predefined_items['use_multisite'][ 'capability' ] = 'manage_network';
$z_mini_menu_predefined_items['use_multisite'][ 'condition' ] = array( 'if_is_multisite' );

$z_mini_menu_predefined_items['use_add_new'][ 'id' ] = 'use_add_new';
$z_mini_menu_predefined_items['use_add_new'][ 'name' ] = __('Add new', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_add_new'][ 'icon' ] = 'dashicons-plus';
$z_mini_menu_predefined_items['use_add_new'][ 'url' ] = 'javascript:void()';
$z_mini_menu_predefined_items['use_add_new'][ 'capability' ] = false;
$z_mini_menu_predefined_items['use_add_new'][ 'condition' ] = array( '' );
$z_mini_menu_predefined_items['use_add_new'][ 'has_submenu_items' ] = true;

$z_mini_menu_predefined_items['use_menus'][ 'id' ] = 'use_menus';
$z_mini_menu_predefined_items['use_menus'][ 'name' ] = __('Manage menus', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_menus'][ 'icon' ] = 'dashicons-menu';
$z_mini_menu_predefined_items['use_menus'][ 'url' ] = admin_url( 'nav-menus.php' );
$z_mini_menu_predefined_items['use_menus'][ 'capability' ] = 'edit_theme_options';
$z_mini_menu_predefined_items['use_menus'][ 'condition' ] = array( '' );

$z_mini_menu_predefined_items['use_widgets'][ 'id' ] = 'use_widgets';
$z_mini_menu_predefined_items['use_widgets'][ 'name' ] = __('Manage widgets', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_widgets'][ 'icon' ] = 'dashicons-index-card';
$z_mini_menu_predefined_items['use_widgets'][ 'url' ] = admin_url( 'widgets.php' );
$z_mini_menu_predefined_items['use_widgets'][ 'capability' ] = 'edit_theme_options';
$z_mini_menu_predefined_items['use_widgets'][ 'condition' ] = array( '' );

$z_mini_menu_predefined_items['use_plugins'][ 'id' ] = 'use_plugins';
$z_mini_menu_predefined_items['use_plugins'][ 'name' ] = __('Manage plugins', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_plugins'][ 'icon' ] = 'dashicons-admin-plugins';
$z_mini_menu_predefined_items['use_plugins'][ 'url' ] = admin_url( 'plugins.php' );
$z_mini_menu_predefined_items['use_plugins'][ 'capability' ] = 'activate_plugins';
$z_mini_menu_predefined_items['use_plugins'][ 'condition' ] = array( '' );

$z_mini_menu_predefined_items['use_users'][ 'id' ] = 'use_users';
$z_mini_menu_predefined_items['use_users'][ 'name' ] = __('Manage users', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_users'][ 'icon' ] = 'dashicons-admin-users';
$z_mini_menu_predefined_items['use_users'][ 'url' ] = admin_url( 'users.php' );
$z_mini_menu_predefined_items['use_users'][ 'capability' ] = 'edit_users';
$z_mini_menu_predefined_items['use_users'][ 'condition' ] = array( '' );

$z_mini_menu_predefined_items['use_woocommerce'][ 'id' ] = 'use_woocommerce';
$z_mini_menu_predefined_items['use_woocommerce'][ 'name' ] = __('Manage WooCommerce', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_woocommerce'][ 'icon' ] = 'dashicons-cart';
$z_mini_menu_predefined_items['use_woocommerce'][ 'url' ] = admin_url( 'admin.php?page=wc-admin' );
$z_mini_menu_predefined_items['use_woocommerce'][ 'capability' ] = 'manage_woocommerce';
$z_mini_menu_predefined_items['use_woocommerce'][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

$z_mini_menu_predefined_items['use_woo_products'][ 'id' ] = 'use_woo_products';
$z_mini_menu_predefined_items['use_woo_products'][ 'name' ] = __('Manage Products', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_woo_products'][ 'icon' ] = 'dashicons-screenoptions';
$z_mini_menu_predefined_items['use_woo_products'][ 'url' ] = admin_url( 'edit.php?post_type=product' );
$z_mini_menu_predefined_items['use_woo_products'][ 'capability' ] = 'edit_products';
$z_mini_menu_predefined_items['use_woo_products'][ 'condition' ] = array( 'if_class_exists', 'woocommerce' );

$z_mini_menu_predefined_items['use_widgets'][ 'id' ] = 'use_widgets';
$z_mini_menu_predefined_items['use_fforms'][ 'name' ] = __('Fluent Forms', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_fforms'][ 'svg' ] = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiAjYTdhYWFkO308L3N0eWxlPjwvZGVmcz48dGl0bGU+ZGFzaGJvYXJkX2ljb248L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJMYXllcl8xLTIiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTUuNTcsMEg0LjQzQTQuNDMsNC40MywwLDAsMCwwLDQuNDNWMTUuNTdBNC40Myw0LjQzLDAsMCwwLDQuNDMsMjBIMTUuNTdBNC40Myw0LjQzLDAsMCwwLDIwLDE1LjU3VjQuNDNBNC40Myw0LjQzLDAsMCwwLDE1LjU3LDBaTTEyLjgyLDE0YTIuMzYsMi4zNiwwLDAsMS0xLjY2LjY4SDYuNUEyLjMxLDIuMzEsMCwwLDEsNy4xOCwxM2EyLjM2LDIuMzYsMCwwLDEsMS42Ni0uNjhsNC42NiwwQTIuMzQsMi4zNCwwLDAsMSwxMi44MiwxNFptMy4zLTMuNDZhMi4zNiwyLjM2LDAsMCwxLTEuNjYuNjhIMy4yMWEyLjI1LDIuMjUsMCwwLDEsLjY4LTEuNjQsMi4zNiwyLjM2LDAsMCwxLDEuNjYtLjY4SDE2Ljc5QTIuMjUsMi4yNSwwLDAsMSwxNi4xMiwxMC41M1ptMC0zLjczYTIuMzYsMi4zNiwwLDAsMS0xLjY2LjY4SDMuMjFhMi4yNSwyLjI1LDAsMCwxLC42OC0xLjY0LDIuMzYsMi4zNiwwLDAsMSwxLjY2LS42OEgxNi43OUEyLjI1LDIuMjUsMCwwLDEsMTYuMTIsNi44MVoiLz48L2c+PC9nPjwvc3ZnPg==';
$z_mini_menu_predefined_items['use_fforms'][ 'url' ] = admin_url( 'admin.php?page=fluent_forms' );
$z_mini_menu_predefined_items['use_fforms'][ 'capability' ] = 'fluentform_forms_manager';
$z_mini_menu_predefined_items['use_fforms'][ 'condition' ] = array( 'if_function_exists', 'wpFluentForm' );

$z_mini_menu_predefined_items['use_wpseo'][ 'id' ] = 'use_wpseo';
$z_mini_menu_predefined_items['use_wpseo'][ 'name' ] = __('Manage Yoast SEO', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_wpseo'][ 'svg' ] = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJlbGVtIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB3aWR0aD0iMTc0cHgiIGhlaWdodD0iMTc0cHgiIHZpZXdCb3g9IjAgMCAxNzQgMTc0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNzQgMTc0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNTIuOCw1Ni4xYzAtMTItOS4zLTIyLTIxLjEtMjMuMWw4LjktMjMuOEgxMTJsLTguNSwyMy43SDQ0LjRjLTEyLjgsMC0yMy4yLDEwLjQtMjMuMiwyMy4ydjYxLjcKCWMwLDEyLjgsMTAuNCwyMy4yLDIzLjIsMjMuMmg5LjdjLTAuNCwwLjEtMC44LDAuMS0xLjIsMC4ybC0yLjIsMC4zdjIzLjJoMi41YzE3LjksMCwyOC44LTksMzctMjMuN2g2Mi42VjU2LjF6IE01NS44LDE1OS42di0xMy43CgljMTEuNS0yLjMsMTUuNy05LjUsMTgtMTUuNmMyLjMtNS45LDIuMy0xMi40LDAtMTguM0w1MC45LDUzLjFINjdsMTYuMyw1MC45bDMyLjMtODkuOGgxNy43TDk0LjEsMTE5LjQKCUM4NC4xLDE0Ny41LDczLjUsMTU4LjcsNTUuOCwxNTkuNnoiLz4KPC9zdmc+Cg==';
$z_mini_menu_predefined_items['use_wpseo'][ 'url' ] = admin_url( 'admin.php?page=wpseo_dashboard' );
$z_mini_menu_predefined_items['use_wpseo'][ 'capability' ] = 'wpseo_manage_options';
$z_mini_menu_predefined_items['use_wpseo'][ 'condition' ] = array( 'if_class_exists', 'WPSEO_Options' );

$z_mini_menu_predefined_items['use_acf'][ 'id' ] = 'use_acf';
$z_mini_menu_predefined_items['use_acf'][ 'name' ] = __('Manage ACF', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_acf'][ 'icon' ] = 'dashicons-welcome-widgets-menus';
$z_mini_menu_predefined_items['use_acf'][ 'url' ] = admin_url( 'edit.php?post_type=acf-field-group' );
$z_mini_menu_predefined_items['use_acf'][ 'capability' ] = 'manage_options';
$z_mini_menu_predefined_items['use_acf'][ 'condition' ] = array( 'if_class_exists', 'ACF' );

$z_mini_menu_predefined_items['use_wpml'][ 'id' ] = 'use_wpml';
$z_mini_menu_predefined_items['use_wpml'][ 'name' ] = __('Manage WPML', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_wpml'][ 'image' ] = plugins_url('/sitepress-multilingual-cms/res/img/icon16.png');
$z_mini_menu_predefined_items['use_wpml'][ 'url' ] = admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' );
$z_mini_menu_predefined_items['use_wpml'][ 'capability' ] = 'wpml_manage_woocommerce_multilingual';
$z_mini_menu_predefined_items['use_wpml'][ 'condition' ] = array( 'if_function_exists', 'icl_object_id' );


/*
 * All custom defined items from the options table
 * 
 */
$options = get_option( 'z_mini_menu_plugin_options' );
if ( !empty( $options[ 'use_custom' ] ) ) {
    foreach ( $options[ 'use_custom' ] as $key => $custom_item ) {
        $z_mini_menu_predefined_items['use_custom'][$key] = $custom_item;
    }
}

?>