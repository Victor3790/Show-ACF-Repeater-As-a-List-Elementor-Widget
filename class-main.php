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
	 * Register the widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager The widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once __DIR__ . '/widgets/class-list-widget.php';

		$widgets_manager->register( new List_Widget() );
	}
}
