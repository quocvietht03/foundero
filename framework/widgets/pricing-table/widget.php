<?php

namespace FounderoElementorWidgets\Widgets\FounderoPricingTable;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class Widget_FounderoPricingTable extends Widget_Base
{

	public function get_name()
	{
		return 'bt-pricing-table';
	}

	public function get_title()
	{
		return __('Pricing Table', 'foundero');
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
			'title',
			[
				'label' => esc_html__('Title', 'foundero'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Basic Plan', 'foundero'),
				'label_block' => true,
			]
		);

        $this->add_control(
			'price',
			[
				'label' => esc_html__('Price', 'foundero'),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$19', 'foundero'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'per_time',
			[
				'label' => esc_html__('Per Time', 'foundero'),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__('/month', 'foundero'),
				'label_block' => true,
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'feature',
            [
                'label' => esc_html__('Feature', 'foundero'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('New Feature', 'foundero'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'foundero'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature' => esc_html__('Feature One', 'foundero'),
                    ],
                    [
                        'feature' => esc_html__('Feature Two', 'foundero'),
                    ],
                    [
                        'feature' => esc_html__('Feature Three', 'foundero'),
                    ],
                ],
                'item_template' => '{{{ feature }}}',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'foundero'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Choose Plan', 'foundero'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'foundero'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'foundero'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

		$this->end_controls_section();
	}

	protected function register_style_content_section_controls()
	{
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_heading',
			[
				'label' => __('Title', 'foundero'),
				'type' => Controls_Manager::HEADING,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'foundero'),
                'selector' => '{{WRAPPER}} .bt-elwg-pricing-table--title',
            ]
        );
        
        $this->add_control(
			'price_per_time_heading',
			[
				'label' => __('Price Per Time', 'foundero'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'price_color',
            [
                'label' => __('Price Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--price span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => __('Price Typography', 'foundero'),
                'selector' => '{{WRAPPER}} .bt-elwg-pricing-table--price span',
            ]
        );

        $this->add_control(
            'per_time_color',
            [
                'label' => __('Per Time Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'per_time_typography',
                'label' => __('Per Time Typography', 'foundero'),
                'selector' => '{{WRAPPER}} .bt-elwg-pricing-table--price',
            ]
        );
        
		$this->add_control(
			'features_heading',
			[
				'label' => __('Feature List', 'foundero'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'features_color',
            [
                'label' => __('Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--features ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_typography',
                'label' => __('Typography', 'foundero'),
                'selector' => '{{WRAPPER}} .bt-elwg-pricing-table--features ul li',
            ]
        );

        $this->add_control(
			'button_heading',
			[
				'label' => __('Button', 'foundero'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography', 'foundero'),
				'selector' => '{{WRAPPER}} .bt-elwg-pricing-table--button',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __('Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table--button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label' => __('Background', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table--button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __('Hover Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table--button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background',
			[
				'label' => __('Hover Background', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table--button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style_layout',
			[
				'label' => esc_html__('Layout', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'box_background_color',
            [
                'label' => __('Background Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--inner' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'box_hover_light_color',
            [
                'label' => __('Hover Light Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );

        $this->add_control(
            'box_divider_color',
            [
                'label' => __('Divider Color', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bt-elwg-pricing-table--features::before' => 'background: linear-gradient(90deg, transparent 0%, {{VALUE}} 55.77%, transparent 100%);',
                ],
            ]
        );

        $this->add_responsive_control(
			'box_padding',
			[
				'label' => esc_html__( 'Padding', 'foundero' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'box_border_width',
			[
				'label' => esc_html__( 'Border Width', 'foundero' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
					'em' => [
						'min' => 0,
						'max' => 5,
					],
					'rem' => [
						'min' => 0,
						'max' => 5,
					],
				],
			]
		);

        $this->add_control(
            'box_border_color_first',
            [
                'label' => __('Border Color First', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'co'
            ]
        );

        $this->add_control(
            'box_border_color_second',
            [
                'label' => __('Border Color Secon', 'foundero'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );

        $this->add_responsive_control(
			'box_border_radius',
			[
				'label' => esc_html__( 'Border Raddius', 'foundero' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bt-elwg-pricing-table, 
                    {{WRAPPER}} .bt-elwg-pricing-table--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_content_section_controls();
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

	protected function render()
	{
		$settings = $this->get_settings_for_display();

        $color_first_gradient = $settings['box_border_color_first'] ? $settings['box_border_color_first'] : '#6D28D9';
        $color_second_gradient = $settings['box_border_color_second'] ? $settings['box_border_color_second'] : '#CB29CD';

		$color_rgb = '109, 40, 217';

		if ( $settings['box_hover_light_color'] ) {
			$rgb = $this->hex_to_rgb($settings['box_hover_light_color']);
			if ($rgb) {
				$color_rgb = "{$rgb[0]}, {$rgb[1]}, {$rgb[2]}";
			}
		}

		?>
			<div class="bt-elwg-pricing-table" style="--color-first-gradient:<?php echo esc_attr($color_first_gradient); ?>; --color-second-gradient:<?php echo esc_attr($color_second_gradient); ?>; --color-light-rgb:<?php echo esc_attr($color_rgb); ?>; ">
                <div class="bt-elwg-pricing-table--inner">
                    <?php 
                        if ( ! empty( $settings['title'] ) ) {
                            echo '<h3 class="bt-elwg-pricing-table--title">' . esc_html( $settings['title'] ) . '</h3>';
                        } 
                        if ( ! empty( $settings['price'] ) ) {
                            echo '<div class="bt-elwg-pricing-table--price"><span>' . esc_html( $settings['price'] ) . '</span> ' . esc_html($settings['per_time']) . '</div>';
                        }
                    ?>
                    <?php if ( ! empty( $settings['features'] ) ) : ?>
                        <div class="bt-elwg-pricing-table--features">
                            <ul>
                                <?php foreach ( $settings['features'] as $feature ) : ?>
                                    <?php if ( ! empty( $feature['feature'] ) ) : ?>
                                        <li><?php echo esc_html( $feature['feature'] ); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php
                    $button_text = ! empty( $settings['button_text'] ) ? $settings['button_text'] : '';
                    $button_link = ! empty( $settings['button_link'] ) ? $settings['button_link'] : [];
                    $button_url  = ! empty( $button_link['url'] ) ? $button_link['url'] : '';

                    $target_attr = ! empty( $button_link['is_external'] ) ? ' target="_blank"' : '';

                    $rel_values = [];
                    if ( ! empty( $button_link['nofollow'] ) ) {
                        $rel_values[] = 'nofollow';
                    }
                    if ( ! empty( $button_link['is_external'] ) ) {
                        $rel_values[] = 'noopener noreferrer';
                    }
                    $rel_attr = $rel_values ? ' rel="' . esc_attr( implode( ' ', $rel_values ) ) . '"' : '';

                    if ( $button_url ) : ?>
                        <div class="bt-elwg-pricing-table--button-wrapper">
                            <a class="bt-elwg-pricing-table--button" href="<?php echo esc_url( $button_url ); ?>"<?php echo $target_attr . $rel_attr; ?>><?php echo esc_html( $button_text ); ?></a>
                        </div>
                    <?php endif; ?>
                    
                </div>
			</div>
		<?php 
	}

	protected function content_template() {}
}
