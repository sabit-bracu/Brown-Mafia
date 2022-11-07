<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_contactform extends Widget_Base {

    public function get_name() {
        return 'coco-contactform';
    }

    public function get_title() {
        return esc_attr__('Contact Form', 'cocobasic-elementor');
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
                'contactform', [
            'label' => esc_attr__('Enter Contact Form 7 shortcode', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_general', [
            'label' => esc_attr__('General', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'content_color', [
            'label' => esc_attr__('Global Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .wpcf7-form' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 input' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 textarea' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 input::placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 textarea::placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 input:ms-input-placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 textarea:ms-input-placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 input::-webkit-input-placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} .wpcf7 textarea::-webkit-input-placeholder' => 'color: {{VALUE}};',
                '{{WRAPPER}} span.wpcf7-not-valid-tip' => 'color: {{VALUE}};',
                '{{WRAPPER}} div.wpcf7-response-output' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'borderwidth', [
            'label' => esc_attr__('Global Border Width', 'cocobasic-elementor'),
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
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} input' => 'border-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} textarea' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'button_border_radius', [
            'label' => esc_attr__('Button Border Radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} .wpcf7 input[type=submit]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_contactform());
