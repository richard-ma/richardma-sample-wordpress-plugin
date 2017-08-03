<?php

function rm_meta_callback() {
?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="job-id" class="rm-row-title">Job ID</label>
            </div>
            <div class="meta-td">
                <input type="text" name="job-id" id="job-id" value="" />
            </div>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
            <span>Principle Duties</span>
        </div>
    </div>
    <div class="meta-editor">
<?php
    $content = get_post_meta($post->ID, 'principle_duties', true);
    $editor = 'principle_duties';
    $settings = array(
        'textarea_rows' => 8,
        'media_buttons' => false,
    );

    wp_editor($content, $editor, $settings);
?>
    </div>
<?php
}

function rm_add_custom_metabox() {

    add_meta_box(
        'rm_meta',
        'Job Listing',
        'rm_meta_callback', // callback function name
        'job',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'rm_add_custom_metabox');
