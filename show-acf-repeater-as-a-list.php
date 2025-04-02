<?php
/**
 * Plugin Name: Show ACF Repeater as a List
 * Description: This plugin adds an elementor widget that shows a repeater as a list.
 * Author: Victor Crespo
 * Author URI: https://victorcrespo.net
 * Version: 1.0.0
 * License: GPL2
 *
 * @package ShowRepater
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

// Define the plugin file path.
if ( ! defined( 'SHOW_ACF_REPEATER_PLUGIN_FILE' ) ) {
	define( 'SHOW_ACF_REPEATER_PLUGIN_FILE', __FILE__ );
}

require_once 'includes/class-main.php';

$show_repeater = ShowRepater\Main::get_instance();
