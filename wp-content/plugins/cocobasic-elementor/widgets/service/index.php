<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_service extends Widget_Base {

    public function get_name() {
        return 'coco-service';
    }

    public function get_title() {
        return esc_attr__('Service', 'cocobasic-elementor');
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
                'title', [
            'label' => esc_attr__('Title', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Title', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'desc', [
            'label' => esc_attr__('Description', 'cocobasic-elementor'),
            'type' => Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => esc_attr__('Description', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'img', [
            'label' => esc_attr__('Image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );
        $this->add_control(
                'url', [
            'label' => esc_attr__('Image Link (optional)', 'cocobasic-elementor'),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'placeholder' => 'http://your-link.com',
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
                'title_color', [
            'label' => esc_attr__('Title Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .service-txt h4' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .service-txt h4',
                ]
        );

        $this->add_control(
                'description_color', [
            'label' => esc_attr__('Description Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .service-txt' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'desciprion_typography',
            'label' => esc_attr__('Description Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .service-txt',
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_service());
