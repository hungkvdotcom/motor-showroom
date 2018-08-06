<?php
/**
 * MotorShowroom setup
 *
 * @package MotorShowroom
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
/**
 * Main MotorShowroom Class.
 *
 * @class MotorShowroom
 */

final class MotorShowroom {

    /**
     * MotorShowroom version.
     *
     * @var string
     */
    public $version = '1.0';

    /**
     * The single instance of the class.
     *
     * @var MotorShowroom
     * @since 1.0
     */
    protected static $_instance = null;

    /**
     * Main MotorShowroom Instance.
     *
     * Ensures only one instance of MotorShowroom is loaded or can be loaded.
     *
     * @since 1.0
     * @static
     * @see WC()
     * @return MotorShowroom - Main instance.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**
     * MotorShowroom Constructor.
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();

        do_action( 'motorshowroom_loaded' );
    }

    /**
     * Define MS Constants.
     */
    function define_constants() {
        $upload_dir = wp_upload_dir( null, false );
//        $this->define('MS_ABSPATH', plugins_url('/', __FILE__));
        $this->define( 'MS_ABSPATH', dirname( MS_PLUGIN_FILE ) . '/' );
        $this->define( 'MS_VERSION', $this->version );
        $this->define( 'MS_LOG_DIR', $upload_dir['basedir'] . '/ms-logs/' );
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }


    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        /**
         * Class autoloader.
         */
//        include_once MS_ABSPATH . 'includes/class-ms-autoloader.php';

        /**
         * Core classes.
         */
        include_once MS_ABSPATH . 'includes/class-ms-post-types.php';

        /**
         * Core functions.
         */
        include_once MS_ABSPATH . 'includes/ms-menu-functions.php';
        include_once MS_ABSPATH . 'includes/ms-core-functions.php';
    }

    /**
     * Get the plugin url.
     *
     * @return string
     */
    public function plugin_url() {
        return untrailingslashit( plugins_url( '/', MS_PLUGIN_FILE ) );
    }

    /**
     * Get the plugin path.
     *
     * @return string
     */
    public function plugin_path() {
        return untrailingslashit( plugin_dir_path( MS_PLUGIN_FILE ) );
    }

    /**
     * Get the template path.
     *
     * @return string
     */
    public function template_path() {
        return apply_filters( 'woocommerce_template_path', 'woocommerce/' );
    }

    /**
     * Get Ajax URL.
     *
     * @return string
     */
    public function ajax_url() {
        return admin_url( 'admin-ajax.php', 'relative' );
    }

}