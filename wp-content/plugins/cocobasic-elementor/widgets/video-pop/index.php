<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_videopop extends Widget_Base {

    public function get_name() {
        return 'coco-vidpop';
    }

    public function get_title() {
        return esc_attr__('Video Popup', 'cocobasic-elementor');
    }

    public function get_icon() {
        return 'fa fa-th';
    }

    public function get_categories() {
        return array('coco-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
                'section_process_1', [
            'label' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'name', [
            'label' => esc_attr__('Unique Name', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('video1', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'url', [
            'label' => esc_attr__('Video url (YouTube or Vimeo)', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
                ]
        );

        $this->add_control(
                'img', [
            'label' => esc_html__('Placeholder image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );

        $this->add_control(
                'play_img', [
            'label' => esc_html__('Play image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_general', [
            'label' => esc_attr__('General', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'content_color', [
            'label' => esc_attr__('Overlay color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} a.video-popup-holder:after' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'play_img_size', [
            'label' => esc_attr__('Play image size', 'cocobasic-elementor'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'unit' => 'px',
            ],
            'tablet_default' => [
                'unit' => 'px',
            ],
            'mobile_default' => [
                'unit' => 'px',
            ],
            'size_units' => [ 'px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} img.popup-play' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'play_img_opacity', [
            'label' => esc_attr__('Play image opacity', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => '0.8',
            'placeholder' => esc_attr__('Set range 0 - 1', 'cocobasic-elementor'),
            'selectors' => [
                '{{WRAPPER}} img.popup-play' => 'opacity: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'image_border_radius', [
            'label' => esc_attr__('Image Border Radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} a.video-popup-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_videopop());
