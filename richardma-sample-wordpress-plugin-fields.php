<?php

function rm_meta_callback($post) {
    wp_nonce_field(basename(__FILE__), 'rm_jobs_nonce');
    $rm_stroed_meta = get_post_meta($post->ID);
?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="job-id" class="rm-row-title"><?php _e('Job ID', 'wp-job-listing'); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" class="rm-row-content" name="job_id" id="job-id" value="<?php if (!empty($rm_stroed_meta['job_id'])) echo esc_attr($rm_stroed_meta['job_id'][0]); ?>" />
            </div>
        </div>
    </div>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="date-listed" class="rm-row-title"><?php _e('Date Listed', 'wp-job-listing'); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" size=10 class="rm-row-content datepicker" name="date_listed" id="date-listed" value="" />
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

function rm_meta_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rm_jobs_nonce']) && wp_verify_nonce($_POST['rm_jobs_nonce'], basename(__FILE__))) ? 'true':'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    if (isset($_POST['job_id'])) {
        update_post_meta($post_id, 'job_id', sanitize_text_field($_POST['job_id']));
    }
}

add_action('save_post', 'rm_meta_save');

function rm_add_custom_metabox() {

    add_meta_box(
        'rm_meta',
        _('Job Listing'),
        'rm_meta_callback', // callback function name
        'job',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'rm_add_custom_metabox');
