<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_timeline extends Widget_Base {

    public function get_name() {
        return 'coco-timeline';
    }

    public function get_title() {
        return esc_attr__('Timeline', 'cocobasic-elementor');
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
            'label' => esc_attr__('Timeline Content', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => esc_attr__('Timeline Content', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'year', [
            'label' => esc_attr__('Year', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_attr__('2019', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Timeline Content', 'cocobasic-elementor'),
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
                'content_color', [
            'label' => esc_attr__('Content color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .timeline-event-content' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'content_typography',
            'label' => esc_attr__('Content Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .timeline-event-content',
                ]
        );

        $this->add_control(
                'year_color', [
            'label' => esc_attr__('Year color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .timeline-event-date' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'year_typography',
            'label' => esc_attr__('Year Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .timeline-event-date',
                ]
        );

        $this->add_control(
                'circle_color', [
            'label' => esc_attr__('Circle color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} li.timeline-event:before' => 'background: {{VALUE}};',
                '{{WRAPPER}} span.timeline-circle:before' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} li.timeline-event:hover span.timeline-circle:before' => 'background: {{VALUE}};',
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
            $year = $item['year'] ? $item['year'] : '';

            $out .= '
                <li class="timeline-event">
                    <span class="timeline-circle"></span>
                    <div class="timeline-event-content">' . $title . '</div>
                    <div class="timeline-event-date">' . $year . '</div>
                </li>          
            ';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_timeline());
