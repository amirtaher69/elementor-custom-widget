<?php
/**
 * Simple Widget
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
 }

use Elementor\Group_Control_Typography;

 class ECW_Simple_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'ecw_simple_widget';
    }

    public function get_title() {
        return 'Simple Widget';
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'تنظیمات محتوا',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // add controls here
        $this->add_control(
            'title',
            [
                'label' => 'عنوان',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'عنوان ویجت را وارد کنید',
                'default' => 'من عنوان ویجت هستم',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'توضیحات',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => 'توضیحات ویجت را وارد کنید',
                'default' => 'این توضیحات از ویجت است',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => 'تصویر',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                    'alt' => 'تصویر پیش‌فرض',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => 'تنظیمات ظاهری',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label' => 'رنگ عنوان',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' =>'#222',
                'selectors' => [
                    '{{WRAPPER}} .ecw-title' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => 'تایپوگرافی عنوان',
                'selector' => '{{WRAPPER}} .ecw-title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => 'تایپوگرافی توضیحات',
                'selector' => '{{WRAPPER}} .ecw-description',
            ]
        );

        $this->add_responsive_control(
            'title_margin_top',
            [
                'label' => 'فاصله عنوان از بالا',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px' , '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ecw-title' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="ecw-simple-widget">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['image']['alt']); ?>">
            <h2 class="ecw-title">
                <?php echo esc_html($settings['title']); ?>
            </h2>
            <p class="ecw-description">
                <?php echo esc_html($settings['description']); ?>
            </p>
        </div>
        <?php
    }
    
 }