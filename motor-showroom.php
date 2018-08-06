<?php
/**
 * Plugin Name: Motor Showroom
 * Plugin URI: http://hungkv.com/products/motor-showroom
 * Description: Create your motor showroom, create your future :)
 * Version: 1.0.0
 * Author: hungkvdotcom
 * Author URI: https://profiles.wordpress.org/hungkvdotcom
 * License: GPLv2 or later
 */
if (!defined('ABSPATH')) exit;  // if direct access

// Define MS_PLUGIN_FILE.
if ( ! defined( 'MS_PLUGIN_FILE' ) ) {
    define( 'MS_PLUGIN_FILE', __FILE__ );
}

// Include the main Motor Showroom class.
if ( ! class_exists( 'MotorShowroom' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-motorshowroom.php';
}

function ms() {
    return MotorShowroom::instance();
}

// Global for backwards compatibility.
$GLOBALS['motorshowroom'] = ms();