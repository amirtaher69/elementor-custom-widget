<?php
/**
 * Simple Widget
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
 }

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
            'title_color',
            [
                'label' => 'رنگ عنوان',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' =>'#222'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="ecw-simple-widget">
            <h2 style="color: <?php echo esc_attr($settings['title_color']); ?>;">
                <?php echo esc_html($settings['title']); ?>
            </h2>
        </div>
        <?php
    }
    
 }