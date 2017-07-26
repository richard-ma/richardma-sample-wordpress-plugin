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

function rm_add_google_analytics() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
        'id' => 'google_analytics',
        'title' => 'Google Analytics',
        'href' => 'http://google.com/analytics/'
    ));
}

add_action('wp_before_admin_bar_render', 'rm_add_google_analytics');
