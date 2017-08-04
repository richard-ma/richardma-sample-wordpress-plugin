<?php

function rm_add_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=job',
        'Reorder jobs',
        'Reorder jobs',
        'manage_options',
        'reorder_jobs',
        'reorder_admin_jobs_callback'
    );
}

add_action('admin_menu', 'rm_add_submenu_page');

function reorder_admin_jobs_callback() {

    $args = array(
        'post_type' => 'job',
        'order_by' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => true,
        'update_post_term_cache' => false,
        'post_per_page' => 50
    );

    $job_listing = new WP_Query($args);

    var_dump($job_listing);
}
