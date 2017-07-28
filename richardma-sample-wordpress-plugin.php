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
