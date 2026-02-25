<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class ECW_Plugin {
    public function __construct() {
        $this->register_hooks();
    }

    private function register_hooks() {
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public function init() {
        if ( ! $this->is_elementor_active() ) {
            $this->register_admin_notice();
            return;
        }
        $this->init_widgets();
    }

    private function is_elementor_active() {
        return did_action( 'elementor/loaded' );
    }

    private function register_admin_notice() {
        add_action( 'admin_notices', array( $this, 'admin_notice_missing_elementor' ) );
    }

    public function admin_notice_missing_elementor() {
        ?>
        <div class="notice notice-error">
            <p>
                این افزونه برای فعالیت به Elementor نیاز دارد.
            </p>
        </div>
        <?php
    }

    private function init_widgets() {
        // add your custom widgets here
    }
}