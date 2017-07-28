<?php

function rm_meta_callback() {
    // something callback function
}

function rm_add_custom_metabox() {

    add_meta_box(
        'rm_meta',
        'Job Listing',
        'rm_meta_callback', // callback function name
        'job',
        'side',
        'low'
    );
}

add_action('add_meta_boxes', 'rm_add_custom_metabox');
