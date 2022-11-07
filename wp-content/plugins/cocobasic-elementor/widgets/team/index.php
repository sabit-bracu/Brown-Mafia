<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_team extends Widget_Base {

    public function get_name() {
        return 'coco-team';
    }

    public function get_title() {
        return esc_attr__('Team', 'cocobasic-elementor');
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
                'num', [
            'label' => esc_attr__('Number of items in row', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'one_half' => esc_attr__('2', 'cocobasic-elementor'),
                'one_third' => esc_attr__('3', 'cocobasic-elementor'),
                'one_fourth' => esc_attr__('4', 'cocobasic-elementor'),
            ],
            'default' => 'one_half',
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
                'overlay_color', [
            'label' => esc_attr__('Overlay color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .member-mask' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'borderwidth', [
            'label' => esc_attr__('Overlay Border Width', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .member-mask:before' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        
         $this->add_responsive_control(
                'borderposition', [
            'label' => esc_attr__('Overlay Border Position', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .member-mask:before' => 'top: {{SIZE}}{{UNIT}}; left: {{SIZE}}{{UNIT}}; right: {{SIZE}}{{UNIT}}; bottom: {{SIZE}}{{UNIT}};',                
            ],
                ]
        );

        $this->add_control(
                'borderwidth_color', [
            'label' => esc_attr__('Overlay border color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .member-mask:before' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => esc_attr__('Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .member-name' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .member-name',
                ]
        );

        $this->add_control(
                'subtitle_color', [
            'label' => esc_attr__('Position color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .member-position' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_attr__('Position Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .member-position',
                ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_team());
