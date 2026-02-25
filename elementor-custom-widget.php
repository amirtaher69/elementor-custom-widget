<?php
/**
 * Plugin Name: Elementor Custom Widget
 * Description: A custom widget for Elementor.
 * Version: 1.0.0
 * Author: Amir taherkhani
 * Author URI: https://wikiteach.ir
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
 }

 define( 'ECW_PATH', plugin_dir_path( __FILE__ ) );
 define( 'ECW_URL', plugin_dir_url( __FILE__ ) );
 define( 'ECW_VERSION', '1.0.0' );

 require_once ECW_PATH . 'includes/plugin.php';
 new ECW_Plugin();