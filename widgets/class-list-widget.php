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
		return esc_html__( 'List of ACF Repeater Text Items', 'show-acf-repeater-as-a-list-for-elementor' );
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
	 * Register the custom controls here
	 */
	protected function register_controls(): void {

		// Content Tab Start.

		$this->start_controls_section(
			'section_repeater',
			array(
				'label' => esc_html__( 'Select a repeater field', 'show-acf-repeater-as-a-list-for-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$current_post = \Elementor\Plugin::$instance->documents->get_current();

		if ( ! $current_post ) {
			return;
		}

		$preview_post_id = $current_post->get_settings( 'preview_id' );

		if ( ! $preview_post_id ) {
			return;
		}

		if ( ! function_exists( 'acf_get_field_groups' ) ) {
			return;
		}

		$field_groups = acf_get_field_groups( array( 'post_id' => $preview_post_id ) );

		$repeater_list = array();

		foreach ( $field_groups as $group ) {
			$field_group_id = $group['ID'];
			$fields         = acf_get_fields( $field_group_id );

			foreach ( $fields as $field ) {
				if ( 'repeater' === $field['type'] ) {
					$repeater_list[ $field['key'] ] = $field['label'];
				}
			}
		}

		$this->add_control(
			'repeater_key',
			array(
				'label'   => esc_html__( 'Repeater', 'show-acf-repeater-as-a-list-for-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $repeater_list,
			)
		);

		$this->end_controls_section();

		// Content Tab End.

		// Style Tab Start.

		$this->start_controls_section(
			'section_list_style',
			array(
				'label' => esc_html__( 'List', 'show-acf-repeater-as-a-list-for-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'show-acf-repeater-as-a-list-for-elementor' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .repeater-list' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'font_family',
			array(
				'label'     => esc_html__( 'Font Family', 'show-acf-repeater-as-a-list-for-elementor' ),
				'type'      => \Elementor\Controls_Manager::FONT,
				'default'   => "'Open Sans', sans-serif",
				'selectors' => array(
					'{{WRAPPER}} .repeater-list' => 'font-family: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Style Tab End.
	}

	/**
	 * The render function for the widget.
	 */
	protected function render(): void {
		$current_post = get_queried_object();
		$post_id      = $current_post ? $current_post->ID : null;

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['repeater_key'] ) ) {
			return;
		}

		if ( ! function_exists( 'get_field' ) ) {
			return;
		}

		$repeater_rows = get_field( $settings['repeater_key'], $post_id );

		if ( $repeater_rows ) {
			echo '<ul class="repeater-list">';
			foreach ( $repeater_rows as $row ) {
				echo '<li>' . esc_html( reset( $row ) ) . '</li>';
			}
			echo '</ul>';
		}
	}

	/**
	 * The content template for the widget.
	 */
	protected function content_template(): void {
		?>
		<#
		if ( '' === settings.repeater_key ) {
			return;
		}
		#>
		<p>
			{{ settings.repeater_key }}
		</p>
		<?php
	}
}
