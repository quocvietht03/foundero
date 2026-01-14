<?php

namespace FounderoElementorWidgets\Widgets\FounderoMenuBusiness;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_FounderoMenuBusiness extends Widget_Base
{

	public function get_name()
	{
		return 'bt-menu-business';
	}

	public function get_title()
	{
		return __('Menu Business', 'foundero');
	}

	public function get_icon()
	{
		return 'eicon-menu-bar';
	}

	public function get_categories()
	{
		return ['bt-foundero'];
	}

	public function get_script_depends()
    {
        return ['foundero-widgets'];
    }

	protected function register_content_section_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'foundero'),
			]
		);

		$repeater = new \Elementor\Repeater();

		// Left menu items
		$repeater->add_control(
			'menu_text',
			[
				'label' => __('Menu Text', 'foundero'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Menu Item', 'foundero'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'menu_link',
			[
				'label' => __('Menu Link', 'foundero'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'foundero'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		// Right content type
		$repeater->add_control(
			'content_type',
			[
				'label' => __('Content Type', 'foundero'),
				'type' => Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'text' => __('Text List', 'foundero'),
					'gallery' => __('Image Gallery', 'foundero'),
				],
			]
		);

		// Text list items
		$repeater->add_control(
			'text_items',
			[
				'label' => __('Text Items', 'foundero'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('Item 1' . "\n" . 'Item 2' . "\n" . 'Item 3', 'foundero'),
				'description' => __('Enter each item on a new line', 'foundero'),
				'condition' => [
					'content_type' => 'text',
				],
			]
		);

		// Gallery images
		$repeater->add_control(
			'gallery',
			[
				'label' => __('Add Images', 'foundero'),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'condition' => [
					'content_type' => 'gallery',
				],
				'description' => __('Maximum 4 images allowed', 'foundero'),
				'max_files' => 4,
			]
		);

		$this->add_control(
			'menu_items',
			[
				'label' => __('Menu Items', 'foundero'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'menu_text' => __('Home', 'foundero'),
						'content_type' => 'text',
						'text_items' => __('Item 1' . "\n" . 'Item 2', 'foundero'),
					],
					[
						'menu_text' => __('About the Coach', 'foundero'),
						'content_type' => 'text',
						'text_items' => __('Item 1' . "\n" . 'Item 2', 'foundero'),
					],
					[
						'menu_text' => __('Coaching Programs', 'foundero'),
						'content_type' => 'text',
						'text_items' => __('1:1 Business Coaching' . "\n" . 'Life & Mindset Coaching' . "\n" . 'Group Coaching Program', 'foundero'),
					],
				],
				'title_field' => '{{{ menu_text }}}',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'foundero'),
				'type' => Controls_Manager::TEXT,
				'default' => __('BOOK A FREE CLARITY CALL', 'foundero'),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __('Button Link', 'foundero'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'foundero'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_menu_section_controls()
	{
		$this->start_controls_section(
			'section_style_menu',
			[
				'label' => esc_html__('Menu Items', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_menu_item_style');

		$this->start_controls_tab(
			'tab_menu_item_normal',
			[
				'label' => esc_html__('Normal', 'foundero'),
			]
		);

		$this->add_control(
			'color_menu_item',
			[
				'label' => esc_html__('Text Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--item' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_menu_item_hover',
			[
				'label' => esc_html__('Hover/Active', 'foundero'),
			]
		);

		$this->add_control(
			'color_menu_item_hover',
			[
				'label' => esc_html__('Text Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--item:hover,
					{{WRAPPER}} .bt-menu-business--item.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_color_menu_item_hover',
			[
				'label' => esc_html__('Border Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--item:hover,
					{{WRAPPER}} .bt-menu-business--item.active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'selector' => '{{WRAPPER}} .bt-menu-business--item',
			]
		);

		$this->add_control(
			'menu_item_padding',
			[
				'label' => esc_html__('Padding', 'foundero'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'menu_item_border_width',
			[
				'label' => esc_html__('Border Width', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--item' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__('Content Area', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_text_list',
			[
				'label' => esc_html__('Text List', 'foundero'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'color_text_item',
			[
				'label' => esc_html__('Text Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--content-text-item' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_item_typography',
				'selector' => '{{WRAPPER}} .bt-menu-business--content-text-item',
			]
		);

		$this->add_control(
			'text_item_spacing',
			[
				'label' => esc_html__('Spacing', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--content-text-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_gallery',
			[
				'label' => esc_html__('Gallery', 'foundero'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'gallery_gap',
			[
				'label' => esc_html__('Gap', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--content-gallery' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_button',
			[
				'label' => esc_html__('Button', 'foundero'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__('Text Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .bt-menu-business--button',
			]
		);

		$this->add_control(
			'button_background',
			[
				'label' => esc_html__('Background', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--button' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'foundero'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__('Border Radius', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .bt-menu-business--button',
			]
		);

		$this->add_control(
			'button_margin_top',
			[
				'label' => esc_html__('Margin Top', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--button' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_layout_section_controls()
	{
		$this->start_controls_section(
			'section_style_layout',
			[
				'label' => esc_html__('Layout', 'foundero'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__('Background Color', 'foundero'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'columns_gap',
			[
				'label' => esc_html__('Columns Gap', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'left_column_width',
			[
				'label' => esc_html__('Left Column Width', 'foundero'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%', 'px'],
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 50,
					],
					'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-menu-business--left' => 'flex-basis: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function register_controls()
	{
		$this->register_content_section_controls();
		$this->register_style_menu_section_controls();
		$this->register_style_content_section_controls();
		$this->register_style_layout_section_controls();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		if (empty($settings['menu_items'])) {
			return;
		}

		?>
		<div class="bt-elwg-menu-business--default">
            <div class="bt-menu-business">
			<div class="bt-menu-business--left">
				<ul class="bt-menu-business--list">
					<?php foreach ($settings['menu_items'] as $index => $item): ?>
						<li class="bt-menu-business--list-item">
							<a href="<?php echo esc_url($item['menu_link']['url'] ?: '#'); ?>" 
							   class="bt-menu-business--item <?php echo $index === 0 ? 'active' : ''; ?>"
							   data-index="<?php echo esc_attr($index); ?>"
							   <?php if (!empty($item['menu_link']['is_external'])): ?>target="_blank"<?php endif; ?>
							   <?php if (!empty($item['menu_link']['nofollow'])): ?>rel="nofollow"<?php endif; ?>>
								<?php echo esc_html($item['menu_text']); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="bt-menu-business--right">
				<div class="bt-menu-business--content-wrapper">
					<?php foreach ($settings['menu_items'] as $index => $item): ?>
						<div class="bt-menu-business--content <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo esc_attr($index); ?>">
							<?php if ($item['content_type'] === 'text' && !empty($item['text_items'])): ?>
								<div class="bt-menu-business--content-text">
									<?php 
									$text_items = explode("\n", $item['text_items']);
									foreach ($text_items as $text_item):
										$text_item = trim($text_item);
										if (!empty($text_item)):
									?>
										<div class="bt-menu-business--content-text-item"><?php echo esc_html($text_item); ?></div>
									<?php 
										endif;
									endforeach; 
									?>
								</div>
							<?php elseif ($item['content_type'] === 'gallery' && !empty($item['gallery'])): ?>
								<div class="bt-menu-business--content-gallery">
									<?php foreach ($item['gallery'] as $image): 
										// Handle different gallery data structures
										$image_url = '';
										$image_alt = '';
										
										if (isset($image['id']) && $image['id']) {
											// If we have attachment ID, get image data
											$image_url = wp_get_attachment_image_url($image['id'], 'full');
											$image_alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true);
										} elseif (isset($image['url'])) {
											// If we have direct URL
											$image_url = $image['url'];
											$image_alt = isset($image['alt']) ? $image['alt'] : '';
										}
										
										if ($image_url):
									?>
										<div class="bt-menu-business--content-gallery-item">
											<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
										</div>
									<?php 
										endif;
									endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				
				<?php if (!empty($settings['button_text'])): ?>
					<?php
					$button_link = $settings['button_link']['url'] ?: '#';
					$button_target = !empty($settings['button_link']['is_external']) ? 'target="_blank"' : '';
					$button_nofollow = !empty($settings['button_link']['nofollow']) ? 'rel="nofollow"' : '';
					?>
					<a href="<?php echo esc_url($button_link); ?>" 
					   class="bt-menu-business--button"
					   <?php echo $button_target . ' ' . $button_nofollow; ?>>
							<?php echo esc_html($settings['button_text']); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {}
}

