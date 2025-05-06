<?php
/**
 * Plugin Name: Responsive Finance Calculator
 * Plugin URI: https://yourdomain.com/
 * Description: A fully responsive, standalone finance calculator suite with dark mode, PDF export, charts, and more.
 * Version: 1.0
 * Author: Your Name or Brand
 * Author URI: https://yourdomain.com/
 */

function rfc_enqueue_assets() {
    wp_enqueue_style('rfc-style', plugins_url('assets/style.css', __FILE__));
    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
    wp_enqueue_script('jspdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js', array(), null, true);
    wp_enqueue_script('rfc-script', plugins_url('assets/script.js', __FILE__), array('chartjs'), null, true);
}
add_action('wp_enqueue_scripts', 'rfc_enqueue_assets');

function rfc_display_calculator() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/index.html';
    return ob_get_clean();
}
add_shortcode('responsive_calculator', 'rfc_display_calculator');
