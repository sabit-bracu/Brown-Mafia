<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_vskill extends Widget_Base {

    public function get_name() {
        return 'coco-vskill';
    }

    public function get_title() {
        return esc_attr__('Verical Skill', 'cocobasic-elementor');
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
            'label' => esc_attr__('Skill', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => esc_attr__('Design', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'percent', [
            'label' => esc_attr__('Percentage', 'cocobasic-elementor'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 80,
            ],
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Design', 'cocobasic-elementor'),
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
                'title_color', [
            'label' => esc_attr__('Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .v-skill-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .v-skill-text',
                ]
        );

        $this->add_control(
                'number_color', [
            'label' => esc_attr__('Number color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .v-skill-percent' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'number_typography',
            'label' => esc_attr__('Number Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .v-skill-percent',
                ]
        );

        $this->add_control(
                'fill_color', [
            'label' => esc_attr__('Fill color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .v-skill-fill' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'fill_background_color', [
            'label' => esc_attr__('Fill background color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .v-skill' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'skills_border_radius', [
            'label' => esc_attr__('Button Border Radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} .v-skill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .v-skill-fill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        
        $this->add_responsive_control(
                'skills_height', [
            'label' => esc_attr__('Skills height', 'cocobasic-elementor'),
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
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .v-skill' => 'height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
       
        $this->add_responsive_control(
                'skills_width', [
            'label' => esc_attr__('Skills width', 'cocobasic-elementor'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'size_units' => [ '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .v-skill' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );


        $this->add_control(
                'skills_space', [
            'label' => esc_attr__('Space between skills', 'cocobasic-elementor'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'size_units' => [ '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .v-skill' => 'margin-right: {{SIZE}}{{UNIT}};',
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

            $out .= '
           <div class="v-skill">           
           <div class="v-skill-info">
           <div class="v-skill-percent">' . $item['percent']['size'] . '%</div>
           <div class="v-skill-text">' . $item['title'] . '</div>           
           </div>
           <div class="v-skill-fill" style="width: ' . $item['percent']['size'] . '%' . '; height: ' . $item['percent']['size'] . '%' . ';"></div>
           </div>                      
            ';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_vskill());
