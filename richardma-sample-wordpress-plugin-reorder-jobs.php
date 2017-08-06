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
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => true,
        'update_post_term_cache' => false,
        'post_per_page' => 50
        //'category_name' => 'articles'
    );

    $job_listing = new WP_Query($args);
?>
    <div id="job-sort" class="wrap">
        <div id="icon-job-admin" class="icon32"><br /></div>
        <h2><?php _e('Sort Job Positions', 'wp-job-listing'); ?><img src="<?php echo esc_url(admin_url() . '/images/loading.gif'); ?>" id="loading-animation" /></h2>
        <?php if ($job_listing->have_posts()) : ?>
            <p><?php _e('<strong>Note:</strong>'); ?></p>
            <ul id="custom-type-list">
            <?php while ($job_listing->have_posts()) : $job_listing->the_post(); ?>
                <li id="<?php esc_attr(the_id()); ?>"><?php esc_html(the_title()); ?></li>
            <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p><?php _e('You have no jobs to sort.', 'wp-job-listing'); ?></p>
        <?php endif; ?>
    </div>
<?php
    //var_dump($job_listing->get_posts());
}

function rm_save_reorder() {
    # check nonce
    if (!check_ajax_referer('wp-job-order', 'security')) {
        return wp_send_json_error('Invalid Nonce');
    }

    # check priviliage
    if (!current_user_can('manage_options')) {
        return wp_send_json_error('You are not allow to do this.');
    }

    $order = $_POST['order'];
    $counter = 0;

    foreach($order as $item_id) {
        $post = array(
            'ID' => (int)$item_id,
            'menu_order' => $counter,
        );
        
        wp_update_post($post);

        $counter++;
    }

    wp_send_json_success('Post saved');
}

add_action('wp_ajax_save_sort', 'rm_save_reorder');
