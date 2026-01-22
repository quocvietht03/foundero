<?php

namespace FounderoElementorWidgets\Widgets\FounderoImagesVerticalScroll;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

class Widget_FounderoImagesVerticalScroll extends Widget_Base
{

	public function get_name()
	{
		return 'bt-image-vertical-scroll';
	}

	public function get_title()
	{
		return __('Images Vertical Scroll', 'foundero');
	}

	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	public function get_categories()
	{
		return ['bt-foundero'];
	}

	protected function register_content_section_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'foundero'),
			]
		);

        $this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'textdomain' ),
				'type' => Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_settings',
			[
				'label' => __('Settings', 'foundero'),
			]
		);

		$this->add_control(
			'scroll_space',
			[
				'label' => esc_html__( 'Spacing', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-images-vertical-scroll--track' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'max' => 160,
					],
					'em' => [
						'min' => 0,
						'max' => 10,
					],
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
					'rem' => [
						'min' => 0,
						'max' => 10,
					],
				],
			]
		);

		$this->add_control(
			'scroll_height',
			[
				'label' => esc_html__( 'Height', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-images-vertical-scroll--gallery' => 'height: {{SIZE}}{{UNIT}};',
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
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);

		$this->add_control(
			'scroll_speed',
			[
				'label' => esc_html__( 'Speed', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms', 'custom' ],
				'default' => [
					'unit' => 's',
				],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-images-vertical-scroll--track' => 'animation: downScroll {{SIZE}}{{UNIT}} linear infinite;',
				],
				'range' => [
					's' => [
						'max' => 100,
						'step' => 1,
					],
					'ms' => [
						'min' => 0,
						'max' => 50000,
						'step' => 1000,
					],
				],
			]
		);

		$this->add_control(
			'scroll_direction',
			[
				'label'   => esc_html__( 'Direction', 'foundero' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'up',
				'options' => [
					'up'  => esc_html__( 'Up', 'foundero' ),
					'down' => esc_html__( 'Down', 'foundero' ),
				],
				'prefix_class' => 'bt-direction--',
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_content_section_controls()
	{
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__('Image', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'foundero' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'foundero' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover img',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'foundero' ) . ' (s)',
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'foundero' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'foundero' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} img',
			]
		);

        $this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_content_section_controls();
		$this->register_style_content_section_controls();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		?>
			<div class="bt-elwg-images-vertical-scroll">
                <div class="bt-elwg-images-vertical-scroll--gallery">
					<div class="bt-elwg-images-vertical-scroll--track">

						<?php 
							if ( ! $settings['gallery'] ) {
								for ( $i = 0; $i < 10; $i++ ) {
									echo '<img src="' . esc_url( Utils::get_placeholder_image_src() ) . '">';
								}
							} else {
								foreach ( $settings['gallery'] as $image ) {
									echo '<img src="' . esc_url( $image['url'] ) . '">';
								}

								foreach ( $settings['gallery'] as $image ) {
									echo '<img src="' . esc_url( $image['url'] ) . '">';
								}
							}
						?>
					</div>
				</div>
			</div>
		<?php 
	}

	protected function content_template() {}
}
