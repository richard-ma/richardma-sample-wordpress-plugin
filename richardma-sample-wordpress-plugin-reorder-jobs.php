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
    echo 'This is the jobs reorder admin page.';
}
