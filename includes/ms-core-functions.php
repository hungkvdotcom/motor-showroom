<?php
/**
 * MotorShowroom Core Functions
 *
 * General core functions available on both the front-end and admin.
 *
 * @package MotorShowroom\Functions
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Get permalink settings for things like products and taxonomies.

 * This is more inline with WP core behavior which does not localize slugs.
 *
 * @since  1.0.0
 * @return array
 */
function ms_get_permalink_structure() {
    $saved_permalinks = (array) get_option( 'permalink_structure', array() );
    $permalinks       = wp_parse_args(
        array_filter( $saved_permalinks ), array(
            'motorcycle_base'           => _x( 'motorcycle', 'slug', 'tdm' ),
            'category_base'          => _x( 'motorcycle-category', 'slug', 'tdm' ),
            'tag_base'               => _x( 'motorcycle-tag', 'slug', 'tdm' )
        )
    );

    if ( $saved_permalinks !== $permalinks ) {
        update_option( 'woocommerce_permalinks', $permalinks );
    }

    $permalinks['motorcycle_rewrite_slug']   = untrailingslashit( $permalinks['motorcycle_base'] );
    $permalinks['category_rewrite_slug']  = untrailingslashit( $permalinks['category_base'] );
    $permalinks['tag_rewrite_slug']       = untrailingslashit( $permalinks['tag_base'] );

    return $permalinks;
}
