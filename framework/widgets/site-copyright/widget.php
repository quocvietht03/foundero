<?php
namespace FounderoElementorWidgets\Widgets\FounderoSiteCopyright;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Widget_FounderoSiteCopyright extends Widget_Base {

	public function get_name() {
		return 'bt-site-copyright';
	}

	public function get_title() {
		return __( 'Site Copyright', 'foundero' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return ['bt-foundero'];
	}

	protected function register_content_section_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'foundero' ),
			]
		);

		$this->add_control(
			'custom',
			[
				'label' => esc_html__( 'Custom Copyright', 'foundero' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	protected function register_layout_section_controls() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'foundero' ),
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'foundero' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'foundero' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'foundero' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'foundero' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-copyright' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_content_section_controls() {

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Content', 'foundero' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'foundero' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-copyright' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'foundero' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-copyright a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color_hover',
			[
				'label' => __( 'Color Hover', 'foundero' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-site-copyright a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Typography', 'foundero' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-elwg-site-copyright',
			]
		);

		$this->end_controls_section();

	}

	protected function register_controls() {
		$this->register_content_section_controls();
		$this->register_layout_section_controls();
		$this->register_style_content_section_controls();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if(function_exists('get_field')){
		  $site_infor = get_field('site_information', 'options');
		} else {
		  return;
		}

		if(!empty($settings['custom'])) {
			echo '<div class="bt-elwg-site-copyright">' . $settings['custom'] . '</div>';
		} else {
			if(!empty($site_infor['site_copyright'])) {
				echo '<div class="bt-elwg-site-copyright">' . $site_infor['site_copyright'] . '</div>';
			}
		}
	}

	protected function content_template() {

	}
}
