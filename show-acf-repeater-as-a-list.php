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

require_once __DIR__ . '/class-main.php';

$show_repeater = ShowRepater\Main::get_instance();
