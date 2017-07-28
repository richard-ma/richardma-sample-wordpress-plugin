<?php

// add menu item to nav bar "Google Analytics"
function rm_add_google_analytics() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
        'id' => 'google_analytics',
        'title' => 'Google Analytics',
        'href' => 'http://google.com/analytics/'
    ));
}

add_action('wp_before_admin_bar_render', 'rm_add_google_analytics');

// add custom post type
function rm_register_post_type() {
    $singular = 'Job Listing';
    $plural = 'Job Listings';

    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New ' . $singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit ' . $singular,
        'new_item'              => 'New ' . $singular,
        'view'                  => 'View ' . $singular,
        'view_item'             => 'view ' . $singular,
        'search_term'           => 'Search ' . $plural,
        'parent'                => 'Parent ' . $singular,
        'not_found'             => 'No ' . $plural . ' found',
        'not_fount_in_trash'    => 'No ' . $plural . ' in Trash'
    );

    $args = array (
        'labels' => $labels,
        'public' => true,
        'publicly_querable' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessman',
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => 'jobs',
            'with_front' => true,
            'pages' => true,
            'feeds' => true
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'custom-fields',
            'thumbnail'
        )
    );

    register_post_type('job', $args);
}

add_action('init', 'rm_register_post_type');

// add custom taxonomy
function rm_register_taxonomy() {
    $plural = 'Locations';
    $singular = 'Location';

    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'search_items'          => 'Search ' . $plural,
        'popular_items'         => 'Popular ' . $plural,
        'all_items'             => 'All ' . $plural,
        'parent_item'           => null,
        'parent_item_colon'           => null,
        'edit_item'             => 'Edit ' . $singular,
        'update_item'           => 'Update ' . $singular,
        'add_new_item'          => 'Add New ' . $singular,
        'new_item_name'         => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'   => 'Add or remove ' . $plural,
        'choose_from_most_used' => 'Choose from the most used ' . $plural,
        'not_found'             => 'No ' . $plural . ' found',
        'menu_name'             => $plural,
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'location')
    );

    register_taxonomy('location', 'job', $args);
}

add_action('init', 'rm_register_taxonomy');
