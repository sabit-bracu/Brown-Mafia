<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_milestone extends Widget_Base {

    public function get_name() {
        return 'coco-milestone';
    }

    public function get_title() {
        return esc_attr__('Milestone Bar', 'cocobasic-elementor');
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
                'title', [
            'label' => esc_attr__('Milestone Content', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => esc_attr__('Milestone Content', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'number', [
            'label' => esc_attr__('Number', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_attr__('35k', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Milestone Content', 'cocobasic-elementor'),
                ]
            ],
            'title_field' => '{{{ title }}}',
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
                'number_color', [
            'label' => esc_attr__('Number Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .milestone-num' => 'color: {{VALUE}};',
                '{{WRAPPER}} p.milestone-num:before' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'number_typography',
            'label' => esc_attr__('Number Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .milestone-num',
                ]
        );

        $this->add_control(
                'content_color', [
            'label' => esc_attr__('Content Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} p.milestone-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'content_typography',
            'label' => esc_attr__('Content Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} p.milestone-text',
                ]
        );

        $this->add_control(
                'separator_background', [
            'label' => esc_attr__('Separator Background', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} li.milestone:before' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

    private function content($content) {
        $out = '';

        foreach ($content as $item) {

            $title = $item['title'] ? $item['title'] : '';
            $number = $item['number'] ? $item['number'] : '';

            $out .= '
                <li class="milestone">
                    <p class="milestone-num">' . $number . '</p>
                    <p class="milestone-text">' . $title . '</p>
                </li>        
            ';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_milestone());
