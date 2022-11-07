<?php

/**
 * Plugin Name: CocoBasic - Cardea Elementor Widgets 
 * Description: Custom Elementor Widgets used in Cardea WordPress Theme.
 * Version: 2.1
 * Author: CocoBasic
 * Author URI: https://www.cocobasic.com
 * Text Domain: cocobasic-elementor
 */
if (!defined('ABSPATH'))
    exit;

if (!class_exists('CocoBasicLandingAddons')) :

    final class cocoBasicLandingAddons {

        private static $instance;

        public static function instance() {

            load_plugin_textdomain('cocobasic-elementor', false, dirname(plugin_basename(__FILE__)) . '/languages/');

            if (!isset(self::$instance) && !(self::$instance instanceof cocoBasicLandingAddons)) {

                self::$instance = new cocoBasicLandingAddons;

                self::$instance->setup_constants();

                self::$instance->hooks();
            }
            return self::$instance;
        }

        private function setup_constants() {

            // Plugin Folder Path
            if (!defined('PM_PLUGIN_DIR')) {
                define('PM_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('PM_PLUGIN_URL')) {
                define('PM_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder Path
            if (!defined('PM_ADDONS_DIR')) {
                define('PM_ADDONS_DIR', plugin_dir_path(__FILE__) . 'widgets/');
            }
        }

        private function hooks() {
            add_action('elementor/widgets/widgets_registered', array(self::$instance, 'include_widgets'));
            add_action('elementor/init', array($this, 'add_elementor_category'));
            add_action('elementor/preview/enqueue_styles', array($this, 'cocobasic_preview_scripts'), 10);
        }

        public function cocobasic_preview_scripts() {
            wp_enqueue_script('cocobasic-elementor-preview-main', PM_PLUGIN_URL . '/assets/js/main.js', '', '', true);
            wp_enqueue_style('cocobasic-elementor-preview-main-style', PM_PLUGIN_URL . '/assets/css/style.css');
        }

        public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                    'coco-element', array(
                'title' => __('CocoBasic', 'cocobasic-elementor'),
                'icon' => 'fa fa-th',
                    ), 1);
        }

        public function include_widgets($widgets_manager) {
            require_once PM_ADDONS_DIR . 'service/index.php';
            require_once PM_ADDONS_DIR . 'skill/index.php';
            require_once PM_ADDONS_DIR . 'verticalskill/index.php';
            require_once PM_ADDONS_DIR . 'imageslider/index.php';
            require_once PM_ADDONS_DIR . 'testimonial/index.php';
            require_once PM_ADDONS_DIR . 'milestone/index.php';
            require_once PM_ADDONS_DIR . 'portfolio/index.php';
            require_once PM_ADDONS_DIR . 'team/index.php';
            require_once PM_ADDONS_DIR . 'video-pop/index.php';
            require_once PM_ADDONS_DIR . 'timeline/index.php';
            require_once PM_ADDONS_DIR . 'contactform/index.php';
        }

    }

    endif;

function runCocoBasicElements() {
    return cocoBasicLandingAddons::instance();
}

runCocoBasicElements();




