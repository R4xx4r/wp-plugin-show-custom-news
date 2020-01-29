<?php

/**
* file which handles all style or frontend imports
*
* @package         Custom Plugin - News
* @subpackage      Custom Plugin - News/includes
* @author          Daniel Murth
* @copyright       2020 Daniel Murth
* @license         MIT
*
**/

// load backend styles and scripts
function load_backend_scripts() {
  wp_register_style( 'custom_backend_css', plugins_url( '../admin/css/styles.css', __FILE__) );
  wp_enqueue_style( 'custom_backend_css' );
}
add_action('admin_enqueue_scripts', 'load_backend_scripts');


// load frontend styles and scripts
function load_frontend_scripts() {
  wp_register_style('custom_frontend_css', plugins_url( '../public/css/styles.css', __FILE__));
  wp_enqueue_style('custom_frontend_css');

  wp_register_script('custom_frontend_js', plugins_url( '../public/js/main.js', __FILE__));
  wp_enqueue_script('custom_frontend_js');
}
add_action('wp_enqueue_scripts', 'load_frontend_scripts');
