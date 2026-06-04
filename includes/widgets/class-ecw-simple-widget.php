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

    protected function render() {
        ?>
        <div class="ecw-simple-widget">
            <h2>سلام . این اولین ویجت المنتور ماست</h2>
        </div>
        <?php
    }
    
 }