<?php
namespace FounderoElementorWidgets\Widgets\FounderoLightShape;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Widget_FounderoLightShape extends Widget_Base {

	public function get_name() {
		return 'bt-light-shape';
	}

	public function get_title() {
		return __( 'Light Shape', 'foundero' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return ['bt-foundero'];
	}

	protected function register_style_content_section_controls() {

		$this->start_controls_section(
			'section_style_layout',
			[
				'label' => esc_html__( 'Layout', 'foundero' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-light-shape' => 'width: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'max' => 1600,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
					],
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
					'vw' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
            'color_inside',
            [
                'label' => __('Color Inside', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );

		$this->add_control(
            'color_outside',
            [
                'label' => __('Color Outside ', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );

		$this->add_control(
			'animation_speed',
			[
				'label' => esc_html__( 'Animation Speed', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
				],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-light-shape' => 'animation: lightZoom {{SIZE}}{{UNIT}} ease-in-out infinite alternate;',
				],
				'range' => [
					's' => [
						'max' => 20,
						'step' => 1,
					],
					'ms' => [
						'min' => 0,
						'max' => 20000,
						'step' => 1000,
					],
				],
			]
		);

		$this->end_controls_section();

	}

	protected function register_controls() {
		$this->register_style_content_section_controls();
	}

	protected function hex_to_rgb( $hex ) {
		$hex = str_replace( '#', '', $hex );

		if ( strlen( $hex ) === 3 ) {
			return array_map( fn($c) => hexdec( str_repeat( $c, 2 ) ), str_split( $hex ) );
		}

		if ( strlen( $hex ) === 6 ) {
			return [
				hexdec( substr( $hex, 0, 2 ) ),
				hexdec( substr( $hex, 2, 2 ) ),
				hexdec( substr( $hex, 4, 2 ) ),
			];
		}

		return '';
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$color_inside_rgb = '17, 24, 39';
		
		if ( $settings['color_inside'] ) {
			$rgb = $this->hex_to_rgb($settings['color_inside']);
			if ($rgb) {
				$color_inside_rgb = "{$rgb[0]}, {$rgb[1]}, {$rgb[2]}";
			}
		}

		$color_outside_rgb = '109, 40, 217';
		
		if ( $settings['color_outside'] ) {
			$rgb = $this->hex_to_rgb($settings['color_outside']);
			if ($rgb) {
				$color_outside_rgb = "{$rgb[0]}, {$rgb[1]}, {$rgb[2]}";
			}
		}

		echo '<div class="bt-elwg-light-shape" style="--color-inside-rgb:' . esc_attr($color_inside_rgb) . '; --color-outside-rgb:' . esc_attr($color_outside_rgb) . ';"></div>';
	}

	protected function content_template() {

	}
}
