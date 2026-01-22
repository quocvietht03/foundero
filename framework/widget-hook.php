<?php 
// Add GSAP animation controls to the Container element
function foundero_add_container_animation_controls( $element, $args ) {
	$element->start_controls_section(
		'gsap_animations_section',
		[
			'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
			'label' => esc_html__( 'GSAP Animations', 'foundero' ),
		]
	);

	$element->add_control(
		'gsap_animations_enable',
		[
			'label' => esc_html__( 'Enable GSAP Animations', 'foundero' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default'      => '',
			'return_value' => 'yes',
			'frontend_available' => true,
		]
	);

	$element->end_controls_section();
}
add_action( 'elementor/element/container/section_layout/after_section_end', 'foundero_add_container_animation_controls', 10, 2 );

// Add GSAP animation controls to the Heading element
function foundero_add_heading_advanced_controls( $element, $args ) {

	$element->start_controls_section(
		'foundero_gsap_section',
		[
			'label' => esc_html__( 'GSAP Animations', 'foundero' ),
			'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
		]
	);

	$element->add_control(
		'foundero_gsap_text_blur_enable',
		[
			'label'        => esc_html__( 'Enable Text Blur', 'foundero' ),
			'type'         => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'prefix_class' => 'gsap-animation--',
		]
	);

	$element->add_control(
		'foundero_animation_trigger',
		[
			'label'   => esc_html__( 'Animation Trigger', 'foundero' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'auto',
			'options' => [
				'auto'  => esc_html__( 'Auto', 'foundero' ),
				'hover' => esc_html__( 'Hover', 'foundero' ),
				'both' => esc_html__( 'Both', 'foundero' ),
			],
			'condition' => [
				'foundero_gsap_text_blur_enable' => 'yes',
			],
			'prefix_class' => 'gsap-animation--',
		]
	);

	$element->add_control(
		'foundero_animation_type',
		[
			'label'   => esc_html__( 'Animation Type', 'foundero' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'random',
			'options' => [
				'random'  => esc_html__( 'Auto Random', 'foundero' ),
				'left_right' => esc_html__( 'Left Right Random', 'foundero' ),
			],
			'condition' => [
				'foundero_gsap_text_blur_enable' => 'yes',
			],
			'frontend_available' => true,
		]
	);

	$element->add_control(
    	'foundero_blur_size',
		[
			'label' => esc_html__( 'Blur Size', 'foundero' ),
			'type'  => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => 100,
					'max' => 1000,
					'step' => 10,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 400,
			],
			'selectors' => [
				'.bt-backdrop-blur-wrapper.gsap-backdrop-blur-cursor, 
				{{WRAPPER}} .gsap-backdrop-blur-auto' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'foundero_gsap_text_blur_enable' => 'yes',
			],
			'frontend_available' => true,
		]
	);

	$element->add_control(
		'foundero_gsap_text_gradient_enable',
		[
			'label'        => esc_html__( 'Enable Text Gradient', 'foundero' ),
			'type'         => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'prefix_class' => 'gsap-text-gradient-animation--',
		]
	);

	$element->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
		[
			'name' => 'background',
			'types' => [ 'classic', 'gradient' ],
			'condition' => [
				'foundero_gsap_text_gradient_enable' => 'yes',
			],
			'selector' => '{{WRAPPER}}.gsap-text-gradient-animation--yes .elementor-heading-title',
		]
	);

	$element->end_controls_section();
}
add_action( 'elementor/element/heading/section_title_style/after_section_end', 'foundero_add_heading_advanced_controls', 10, 2 );

function foundero_change_heading_widget_content( $widget_content, $widget ) {

	if ( 'heading' === $widget->get_name() ) {
		$settings = $widget->get_settings();

		if ( ( $settings['foundero_gsap_text_blur_enable'] === 'yes' && $settings['foundero_animation_trigger'] === 'auto' ) || ( $settings['foundero_gsap_text_blur_enable'] === 'yes' && $settings['foundero_animation_trigger'] === 'both' ) ) {
			$widget_content .= '<span class="bt-backdrop-blur-wrapper gsap-backdrop-blur-auto">
									<span class="bt-backdrop-blur"></span>
									<span class="bt-backdrop-blur"></span>
									<span class="bt-backdrop-blur"></span>
									<span class="bt-backdrop-blur"></span>
									<span class="bt-backdrop-blur"></span>
									<span class="bt-backdrop-blur"></span>
								</span>';
		}
	}

	return $widget_content;

}
add_filter( 'elementor/widget/render_content', 'foundero_change_heading_widget_content', 10, 2 );

// Add GSAP animation controls to the Image element
function foundero_add_image_advanced_controls( $element, $args ) {

	$element->start_controls_section(
		'foundero_gsap_section',
		[
			'label' => esc_html__( 'GSAP Animations', 'foundero' ),
			'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
		]
	);

	$element->add_control(
		'foundero_gsap_spin_enable',
		[
			'label'        => esc_html__( 'Enable GSAP Spin', 'foundero' ),
			'type'         => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'frontend_available' => true,
		]
	);

	$element->end_controls_section();
}
add_action( 'elementor/element/image/section_style_image/after_section_end', 'foundero_add_image_advanced_controls', 10, 2 );

// Add Business animation controls to the Icon element
function foundero_add_icon_business_animation_controls( $element, $args ) {
	$element->start_controls_section(
		'foundero_gsap_section',
		[
			'label' => esc_html__( 'GSAP Animations', 'foundero' ),
			'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
		]
	);

	$element->add_control(
		'foundero_gsap_border_gradient_animation',
		[
			'label'   => esc_html__( 'Border Gradient Animation', 'foundero' ),
			'type'         => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'condition' => [
				'view' => 'default',
			],
			'prefix_class' => 'gsap-border-gradient-animation--',
		]
	);

	$element->end_controls_section();
}
add_action( 'elementor/element/icon/section_style_icon/after_section_end', 'foundero_add_icon_business_animation_controls', 10, 2 );
