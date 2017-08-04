<?php

/*
 * Plugin Name: Richardma Sample Wordpress Plugin
 * Plugin URI: https://github.com/richard-ma/richardma-sample-wordpress-plugin
 * Author: Richard Ma
 * Author URI: http://richardma.info
 * Version: 0.1
 * Lincense: MIT
 */

// exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// require other php file
require_once( plugin_dir_path(__FILE__) . 'richardma-sample-wordpress-plugin-cpt.php');
require_once( plugin_dir_path(__FILE__) . 'richardma-sample-wordpress-plugin-fields.php');
require_once( plugin_dir_path(__FILE__) . 'richardma-sample-wordpress-plugin-reorder-jobs.php');

function rm_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job') {
        wp_enqueue_style('rm-admin-css', plugins_url('css/admin-jobs.css', __FILE__));
        wp_enqueue_script('rm-job-js', plugins_url('js/admin-jobs.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), 20150204, true);
        wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
        wp_enqueue_script('rm-custom-quicktags', plugins_url('js/rm-quicktags.js', __FILE__), array('quicktags'), 20150206, true);
    }
}

add_action('admin_enqueue_scripts', 'rm_admin_enqueue_scripts');
