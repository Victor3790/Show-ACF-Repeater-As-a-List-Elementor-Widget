<?php
/**
 * The Elementor widget.
 *
 * @package ShowRepater
 */

namespace ShowRepater;

/**
 * This class will handle the widget.
 */
class List_Widget extends \Elementor\Widget_Base {
	/**
	 * Get the name of the widget.
	 *
	 * @return string The name of the widget.
	 */
	public function get_name(): string {
		return 'show_acf_repeater_as_a_list_widget';
	}

	/**
	 * Get the title of the widget.
	 *
	 * @return string The title of the widget.
	 */
	public function get_title(): string {
		return esc_html__( 'List of ACF Repeater Text Items', 'show-acf-repeater-as-a-list' );
	}

	/**
	 * Get the icon of the widget.
	 *
	 * @return string The icon of the widget.
	 */
	public function get_icon(): string {
		return 'eicon-code';
	}

	/**
	 * Get the categories of the widget.
	 *
	 * @return array The categories of the widget.
	 */
	public function get_categories(): array {
		return array( 'basic' );
	}

	/**
	 * The render function for the widget.
	 */
	protected function render(): void {
		?>
		<p> Hello World </p>
		<?php
	}

	/**
	 * The content template for the widget.
	 */
	protected function content_template(): void {
		?>
		<p> Hello World </p>
		<?php
	}
}
