<?php
/**
 * This is the main class for the plugin.
 *
 * @package ShowRepater
 */

namespace ShowRepater;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * The main class for the plugin.
 */
class Main {
	/**
	 * The instance of the class.
	 *
	 * @var Main
	 */
	private static $instance = null;

	/**
	 * The constructor for the class.
	 */
	private function __construct() {
		$this->define_constants();
		// Add hoooks here.
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
	}

	/**
	 * Get the instance of the class.
	 *
	 * @return Main
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the constants for the plugin.
	 */
	private function define_constants() {
		if ( ! defined( __NAMESPACE__ . '\VERSION' ) ) {
			define( __NAMESPACE__ . '\VERSION', '1.0.0' );
		}

		if ( ! defined( __NAMESPACE__ . '\URL' ) ) {
			define( __NAMESPACE__ . '\URL', plugin_dir_url( SHOW_ACF_REPEATER_PLUGIN_FILE ) );
		}

		if ( ! defined( __NAMESPACE__ . '\PATH' ) ) {
			define( __NAMESPACE__ . '\PATH', plugin_dir_path( SHOW_ACF_REPEATER_PLUGIN_FILE ) );
		}
	}

	/**
	 * Register the widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager The widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once namespace\PATH . '/widgets/class-list-widget.php';

		$widgets_manager->register( new List_Widget() );
	}
}
