<?php 
/**
 * @param \Elementor\Controls_Stack $element    The element type.
 * @param string                    $section_id Section ID.
 * @param array                     $args       Section arguments.
 */
function foundero_inject_custom_control( $element, $section_id, $args ) {

	if ( 'container' === $element->get_name() && 'section_effects' === $section_id ) {
        
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
			]
		);

		$element->end_controls_section();

	}

}
add_action( 'elementor/element/before_section_start', 'foundero_inject_custom_control', 10, 3 );


/**
 * Add a custom class and a data attribute to all the elements
 * containing a specific setting defined through the element control.
 *
 * @param \Elementor\Element_Base $element The element instance.
 */
function foundero_add_attributes_to_elements( $element ) {
    if ( 'container' === $element->get_name() && 'yes' === $element->get_settings( 'gsap_animations_enable' ) ) {
        $element->add_render_attribute(
            '_wrapper',
            [
                'class' => 'gsap-animated',
                'data-gsap-animation' => 'yes',
            ]
        );
    }

}
add_action( 'elementor/frontend/before_render', 'foundero_add_attributes_to_elements' );