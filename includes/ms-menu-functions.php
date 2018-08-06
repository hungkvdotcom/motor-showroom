<?php
/**
 * MotorShowroom add menu in dashboard
 *
 * @package MotorShowroom
 * @since   1.0.0
 */

/**
 * Register a custom menu page.
 */
function ms_register_menu_page() {
    add_menu_page(
        esc_html__( 'Motor Showroom', 'tdm' ),
        'Motor Showroom',
        'manage_options',
        'myplugin/myplugin-admin.php',
        '',
        plugins_url( 'motor-showroom/assets/images/icon.png' ),
        11
    );
}
add_action( 'admin_menu', 'ms_register_menu_page' );