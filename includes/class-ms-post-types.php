<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;
/**
 * Post types Class.
 */
class MS_Post_Types {

    /**
     * Hook in methods.
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
        add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
    }
    /**
     * Register core taxonomies.
     */
    public static function register_taxonomies() {

        if ( ! is_blog_installed() ) {
            return;
        }

        do_action( 'motorshowroom_register_taxonomy' );

        $permalinks = ms_get_permalink_structure();


        register_taxonomy(
            'motorcycle_cat',
            apply_filters( 'motorshowroom_taxonomy_objects_motorcycle_cat', array( 'motorcycle' ) ),
            apply_filters(
                'woocommerce_taxonomy_args_motorcycle_cat', array(
                    'hierarchical'          => true,
                    'update_count_callback' => '_wc_term_recount',
                    'label'                 => __( 'Categories', 'tdm' ),
                    'labels'                => array(
                        'name'              => __( 'Motorcycle categories', 'tdm' ),
                        'singular_name'     => __( 'Category', 'woocommerce' ),
                        'menu_name'         => _x( 'Categories', 'Admin menu name', 'tdm' ),
                        'search_items'      => __( 'Search categories', 'tdm' ),
                        'all_items'         => __( 'All categories', 'tdm' ),
                        'parent_item'       => __( 'Parent category', 'tdm' ),
                        'parent_item_colon' => __( 'Parent category:', 'tdm' ),
                        'edit_item'         => __( 'Edit category', 'tdm' ),
                        'update_item'       => __( 'Update category', 'tdm' ),
                        'add_new_item'      => __( 'Add new category', 'tdm' ),
                        'new_item_name'     => __( 'New category name', 'tdm' ),
                        'not_found'         => __( 'No categories found', 'tdm' ),
                    ),
                    'show_ui'               => true,
                    'query_var'             => true,
                    'capabilities'          => array(
                        'manage_terms' => 'manage_motorcycle_terms',
                        'edit_terms'   => 'edit_motorcycle_terms',
                        'delete_terms' => 'delete_motorcycle_terms',
                        'assign_terms' => 'assign_motorcycle_terms',
                    ),
                    'rewrite'               => array(
                        'slug'         => $permalinks['category_rewrite_slug'],
                        'with_front'   => false,
                        'hierarchical' => true,
                    ),
                )
            )
        );

        register_taxonomy(
            'motorcycle_tag',
            apply_filters( 'motorshowroom_taxonomy_objects_motorcycle_tag', array( 'motorcycle' ) ),
            apply_filters(
                'motorshowroom_taxonomy_args_motorcycle_tag', array(
                    'hierarchical'          => false,
                    'update_count_callback' => '_wc_term_recount',
                    'label'                 => __( 'Motorcycle tags', 'tdm' ),
                    'labels'                => array(
                        'name'                       => __( 'Motorcycle tags', 'tdm' ),
                        'singular_name'              => __( 'Tag', 'tdm' ),
                        'menu_name'                  => _x( 'Tags', 'Admin menu name', 'tdm' ),
                        'search_items'               => __( 'Search tags', 'tdm' ),
                        'all_items'                  => __( 'All tags', 'tdm' ),
                        'edit_item'                  => __( 'Edit tag', 'tdm' ),
                        'update_item'                => __( 'Update tag', 'tdm' ),
                        'add_new_item'               => __( 'Add new tag', 'tdm' ),
                        'new_item_name'              => __( 'New tag name', 'tdm' ),
                        'popular_items'              => __( 'Popular tags', 'tdm' ),
                        'separate_items_with_commas' => __( 'Separate tags with commas', 'tdm' ),
                        'add_or_remove_items'        => __( 'Add or remove tags', 'tdm' ),
                        'choose_from_most_used'      => __( 'Choose from the most used tags', 'tdm' ),
                        'not_found'                  => __( 'No tags found', 'tdm' ),
                    ),
                    'show_ui'               => true,
                    'query_var'             => true,
                    'capabilities'          => array(
                        'manage_terms' => 'manage_motorcycle_terms',
                        'edit_terms'   => 'edit_motorcycle_terms',
                        'delete_terms' => 'delete_motorcycle_terms',
                        'assign_terms' => 'assign_motorcycle_terms',
                    ),
                    'rewrite'               => array(
                        'slug'       => $permalinks['tag_rewrite_slug'],
                        'with_front' => false,
                    ),
                )
            )
        );

    }

    /**
     * Register core post types.
     */
    public static function register_post_types() {
        if ( ! is_blog_installed()) {
            return;
        }

        do_action( 'motorshowroom_register_post_type' );

        $permalinks = ms_get_permalink_structure();
//        $supports   = array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'publicize', 'wpcom-markdown' );

        register_post_type(
            'motorcycle',
            apply_filters(
                'motorcycle',
                array(
                    'labels'              => array(
                        'name'                  => __( 'Motorcycles', 'woocommerce' ),
                        'singular_name'         => __( 'Motorcycle', 'woocommerce' ),
                        'all_items'             => __( 'All Motorcycles', 'woocommerce' ),
                        'menu_name'             => _x( 'Motorcycles', 'Admin menu name', 'woocommerce' ),
                        'add_new'               => __( 'Add New', 'woocommerce' ),
                        'add_new_item'          => __( 'Add new motorcycle', 'woocommerce' ),
                        'edit'                  => __( 'Edit', 'woocommerce' ),
                        'edit_item'             => __( 'Edit motorcycle', 'woocommerce' ),
                        'new_item'              => __( 'New motorcycle', 'woocommerce' ),
                        'view_item'             => __( 'View motorcycle', 'woocommerce' ),
                        'view_items'            => __( 'View motorcycles', 'woocommerce' ),
                        'search_items'          => __( 'Search motorcycles', 'woocommerce' ),
                        'not_found'             => __( 'No motorcycles found', 'woocommerce' ),
                        'not_found_in_trash'    => __( 'No motorcycles found in trash', 'woocommerce' ),
                        'parent'                => __( 'Parent motorcycle', 'woocommerce' ),
                        'featured_image'        => __( 'Product image', 'woocommerce' ),
                        'set_featured_image'    => __( 'Set motorcycle image', 'woocommerce' ),
                        'remove_featured_image' => __( 'Remove motorcycle image', 'woocommerce' ),
                        'use_featured_image'    => __( 'Use as motorcycle image', 'woocommerce' ),
                        'insert_into_item'      => __( 'Insert into motorcycle', 'woocommerce' ),
                        'uploaded_to_this_item' => __( 'Uploaded to this motorcycle', 'woocommerce' ),
                        'filter_items_list'     => __( 'Filter motorcycles', 'woocommerce' ),
                        'items_list_navigation' => __( 'Motorcycles navigation', 'woocommerce' ),
                        'items_list'            => __( 'Motorcycles list', 'woocommerce' ),
                    ),
                    'description'         => __( 'This is where you can add new products to your store.', 'woocommerce' ),
                    'public'              => true,
                    'show_ui'             => true,
                    'capability_type'     => 'post',
                    'menu_icon'           => '',
                    'map_meta_cap'        => true,
                    'publicly_queryable'  => true,
                    'exclude_from_search' => false,
                    'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
                    'rewrite'             => $permalinks['motorcycle_rewrite_slug'] ? array(
                        'slug'       => $permalinks['motorcycle_rewrite_slug'],
                        'with_front' => false,
                        'feeds'      => true,
                    ) : false,
                    'query_var'           => true,
//                    'supports'            => $supports,
//                    'has_archive'         => $has_archive,
                    'show_in_nav_menus'   => true,
                    'show_in_rest'        => true,
                )
            )
        );

    }

}

MS_Post_types::init();