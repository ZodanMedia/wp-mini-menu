<?php

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}


/*
 * 1.  All predefined settings
 * 
 */
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
$z_mini_menu_predefined_items['use_fforms'][ 'svg' ] = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiAjZmZmZjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmRhc2hib2FyZF9pY29uPC90aXRsZT48ZyBpZD0iTGF5ZXJfMiIgZGF0YS1uYW1lPSJMYXllciAyIj48ZyBpZD0iTGF5ZXJfMS0yIiBkYXRhLW5hbWU9IkxheWVyIDEiPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTE1LjU3LDBINC40M0E0LjQzLDQuNDMsMCwwLDAsMCw0LjQzVjE1LjU3QTQuNDMsNC40MywwLDAsMCw0LjQzLDIwSDE1LjU3QTQuNDMsNC40MywwLDAsMCwyMCwxNS41N1Y0LjQzQTQuNDMsNC40MywwLDAsMCwxNS41NywwWk0xMi44MiwxNGEyLjM2LDIuMzYsMCwwLDEtMS42Ni42OEg2LjVBMi4zMSwyLjMxLDAsMCwxLDcuMTgsMTNhMi4zNiwyLjM2LDAsMCwxLDEuNjYtLjY4bDQuNjYsMEEyLjM0LDIuMzQsMCwwLDEsMTIuODIsMTRabTMuMy0zLjQ2YTIuMzYsMi4zNiwwLDAsMS0xLjY2LjY4SDMuMjFhMi4yNSwyLjI1LDAsMCwxLC42OC0xLjY0LDIuMzYsMi4zNiwwLDAsMSwxLjY2LS42OEgxNi43OUEyLjI1LDIuMjUsMCwwLDEsMTYuMTIsMTAuNTNabTAtMy43M2EyLjM2LDIuMzYsMCwwLDEtMS42Ni42OEgzLjIxYTIuMjUsMi4yNSwwLDAsMSwuNjgtMS42NCwyLjM2LDIuMzYsMCwwLDEsMS42Ni0uNjhIMTYuNzlBMi4yNSwyLjI1LDAsMCwxLDE2LjEyLDYuODFaIi8+PC9nPjwvZz48L3N2Zz4=';
$z_mini_menu_predefined_items['use_fforms'][ 'url' ] = admin_url( 'admin.php?page=fluent_forms' );
$z_mini_menu_predefined_items['use_fforms'][ 'capability' ] = 'fluentform_forms_manager';
$z_mini_menu_predefined_items['use_fforms'][ 'condition' ] = array( 'if_function_exists', 'wpFluentForm' );

$z_mini_menu_predefined_items['use_gravityforms'][ 'name' ] = __('Gravity Forms', 'z-mini-admin-menu');
$z_mini_menu_predefined_items['use_gravityforms'][ 'svg' ] = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHdpZHRoPSIyMSIgaGVpZ2h0PSIyMSIgdmlld0JveD0iMCAwIDIxIDIxIiBmaWxsPSIjZmZmZmZmIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxtYXNrIGlkPSJtYXNrMCIgbWFzay10eXBlPSJhbHBoYSIgbWFza1VuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeD0iMiIgeT0iMSIgd2lkdGg9IjE3IiBoZWlnaHQ9IjIwIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTExLjU5MDYgMi4wMzcwM0wxNy4xNzkzIDUuNDQ4MjRDMTcuODk0IDUuODg0IDE4LjQ3NjcgNi45NTI5OCAxOC40NzY3IDcuODI0NTFWMTQuNjUwM0MxOC40NzY3IDE1LjUxODUgMTcuODk0IDE2LjU4NzQgMTcuMTc5MyAxNy4wMjMyTDExLjU5MDYgMjAuNDMxQzEwLjg3OTIgMjAuODY2OCA5LjcxMDU1IDIwLjg2NjggOC45OTkwOSAyMC40MzFMMy40MTA0MSAxNy4wMTk4QzIuNjk1NzMgMTYuNTg0IDIuMTEzMDQgMTUuNTE4NSAyLjExMzA0IDE0LjY0NjlWNy44MjExQzIuMTEzMDQgNi45NTI5OCAyLjY5ODk1IDUuODg0IDMuNDEwNDEgNS40NDgyNEw4Ljk5OTA5IDIuMDM3MDNDOS43MTA1NSAxLjYwMTI2IDEwLjg3OTIgMS42MDEyNiAxMS41OTA2IDIuMDM3MDNaTTE1Ljc0OTQgOS4zNzUwM0g4LjgxMDQ5QzguMzgyOTkgOS4zNzUwMyA4LjA2MjM3IDkuNTAxNjQgNy44MDkwNCA5Ljc3MDY4QzcuMjU0ODggMTAuMzYwMiA2Ljk2MTk2IDExLjUwMzYgNi45MTg0MiAxMi4xNDA2SDEzLjc1MDVWMTAuNDI3NUgxNS43MDE5VjE0LjA5MTJINC44NDAzMUM0Ljg0MDMxIDE0LjA5MTIgNC44Nzk4OSAxMC4wMzk3IDYuMzkxOTcgOC40MzMzOUM3LjAxNzM4IDcuNzY0NzUgNy44NDA3IDcuNDI0NDkgOC44MzAyOCA3LjQyNDQ5SDE1Ljc0OTRWOS4zNzUwM1oiIGZpbGw9IiNmZmZmZmYiLz48L21hc2s+PGcgbWFzaz0idXJsKCNtYXNrMCkiPjxyZWN0IHg9IjAuMjk0OTIyIiB5PSIwLjc1NzgxMiIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBmaWxsPSIjZmZmZmZmIi8+PC9nPjwvc3ZnPg==';
$z_mini_menu_predefined_items['use_gravityforms'][ 'url' ] = admin_url( 'admin.php?page=gf_edit_forms' );
$z_mini_menu_predefined_items['use_gravityforms'][ 'capability' ] = 'manage_options';
$z_mini_menu_predefined_items['use_gravityforms'][ 'condition' ] = array( 'if_class_exists', 'GFCommon' );





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
$z_mini_menu_predefined_items['use_wpml'][ 'svg' ] = plugins_url('/sitepress-multilingual-cms/res/img/icon16.svg');
$z_mini_menu_predefined_items['use_wpml'][ 'url' ] = admin_url( 'admin.php?page=sitepress-multilingual-cms/menu/languages.php' );
$z_mini_menu_predefined_items['use_wpml'][ 'capability' ] = 'wpml_manage_woocommerce_multilingual';
$z_mini_menu_predefined_items['use_wpml'][ 'condition' ] = array( 'if_function_exists', 'icl_object_id' );


/*
 * 2. Get all saved settings from the options table
 * 
 */
$z_mini_menu_options = get_option( 'z_mini_menu_plugin_options' );
if( empty( $z_mini_menu_options ) ) {
    $z_mini_menu_options = array();
}
/*
 * 3. Loop through all custom defined items in the options table
 * 
 */
if ( !empty( $z_mini_menu_options[ 'use_custom' ] ) ) {
    foreach ( $z_mini_menu_options[ 'use_custom' ] as $z_mini_menu_option_key => $z_mini_menu_option_custom_item ) {
        $z_mini_menu_predefined_items['use_custom'][$z_mini_menu_option_key] = $z_mini_menu_option_custom_item;
    }
}
/*
 * 4. Make sure we have at least 1 role to match against
 * 
 */
if( empty( $z_mini_menu_options['use_roles']) ) {
    $z_mini_menu_options['use_roles'] = array (
        0 => 'administrator'
    );
}

?>