<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_skill extends Widget_Base {

    public function get_name() {
        return 'coco-skill';
    }

    public function get_title() {
        return esc_attr__('Skill Bar', 'cocobasic-elementor');
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
                '{{WRAPPER}} .skill-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .skill-text span',
                ]
        );

        $this->add_control(
                'number_color', [
            'label' => esc_attr__('Number color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .skill-percent' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'number_typography',
            'label' => esc_attr__('Number Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .skill-percent',
                ]
        );

        $this->add_control(
                'fill_color', [
            'label' => esc_attr__('Fill color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .skill-fill' => 'background: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'fill_height', [
            'label' => esc_attr__('Fill height', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .skill-fill' => 'height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'fill_background_color', [
            'label' => esc_attr__('Fill background color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .skill' => 'background: {{VALUE}};',
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

            $percent = $item['percent'] ? 'style=width:' . $item['percent']['size'] . '%' . ';' : '';
            $title = $item['title'] ? '<span>' . $item['title'] . '</span>' : '';

            $out .= '
              <div class="skill-holder">
                  <div class="skill-percent">' . $item['percent']['size'] . '%' . '</div>
                      <div class="skill-text">
                            ' . $title . '
                            <div class="skill">
                                 <div class="skill-fill" ' . $percent . '></div>
                            </div>
                       </div>
               </div>           
            ';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_skill());
