<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Register Custom Post Type
function motorcycle_post_type() {

    $labels = array(
        'name'                  => _x( 'Motorcycles', 'Post Type General Name', 'motor-showroom' ),
        'singular_name'         => _x( 'Motorcycle', 'Post Type Singular Name', 'motor-showroom' ),
        'menu_name'             => __( 'Motorcycle', 'motor-showroom' ),
        'name_admin_bar'        => __( 'Motorcycle', 'motor-showroom' ),
        'archives'              => __( 'Item Archives', 'motor-showroom' ),
        'attributes'            => __( 'Item Attributes', 'motor-showroom' ),
        'parent_item_colon'     => __( 'Parent Item:', 'motor-showroom' ),
        'all_items'             => __( 'All Items', 'motor-showroom' ),
        'add_new_item'          => __( 'Add New Item', 'motor-showroom' ),
        'add_new'               => __( 'Add New Motorcycle', 'motor-showroom' ),
        'new_item'              => __( 'New Item', 'motor-showroom' ),
        'edit_item'             => __( 'Edit Item', 'motor-showroom' ),
        'update_item'           => __( 'Update Item', 'motor-showroom' ),
        'view_item'             => __( 'View Item', 'motor-showroom' ),
        'view_items'            => __( 'View Items', 'motor-showroom' ),
        'search_items'          => __( 'Search Item', 'motor-showroom' ),
        'not_found'             => __( 'Not found', 'motor-showroom' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'motor-showroom' ),
        'featured_image'        => __( 'Featured Image', 'motor-showroom' ),
        'set_featured_image'    => __( 'Set featured image', 'motor-showroom' ),
        'remove_featured_image' => __( 'Remove featured image', 'motor-showroom' ),
        'use_featured_image'    => __( 'Use as featured image', 'motor-showroom' ),
        'insert_into_item'      => __( 'Insert into item', 'motor-showroom' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'motor-showroom' ),
        'items_list'            => __( 'Items list', 'motor-showroom' ),
        'items_list_navigation' => __( 'Items list navigation', 'motor-showroom' ),
        'filter_items_list'     => __( 'Filter items list', 'motor-showroom' ),
    );
    $args = array(
        'label'                 => __( 'Motorcycle', 'motor-showroom' ),
        'description'           => __( 'Post Type Description', 'motor-showroom' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'motorcycle', $args );

}
add_action( 'init', 'motorcycle_post_type', 0 );