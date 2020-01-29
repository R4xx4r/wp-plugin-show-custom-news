<?php
/**
 * Custom news plugin
 *
 * @package         Custom news plugin
 * @author          Daniel Murth
 * @copyright       2020 Daniel Murth
 * @license         MIT
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Plugin - News
 * Description:       A small news plugin which allows the admin to control how much news entries are show on page X. It's used in FE via shortcodes.
 * Version:           1.0
 * Author:            Daniel Murth
 * License:           MIT
 */


// add scripts like css or js to our plugin
require plugin_dir_path( __FILE__ ) . 'includes/scripts.php';

// add settings/options and all relevant operations for these
require plugin_dir_path( __FILE__ ) . 'includes/settings.php';

// shortcode handling
require plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';
