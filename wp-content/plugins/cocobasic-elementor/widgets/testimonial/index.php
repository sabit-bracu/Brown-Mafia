<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_testimonial extends Widget_Base {

    public function get_name() {
        return 'coco-testimonial';
    }

    public function get_title() {
        return esc_attr__('Testimonial', 'cocobasic-elementor');
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
            'label' => esc_attr__('Slide Name', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Slide Name', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'name', [
            'label' => esc_attr__('Name', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Name', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'position', [
            'label' => esc_attr__('Position', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Position', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'desc', [
            'label' => esc_attr__('Content', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'label_block' => true,
            'default' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'img', [
            'label' => esc_attr__('Image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );
        $repeater->add_control(
                'url', [
            'label' => esc_attr__('Image Link (optional)', 'cocobasic-elementor'),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'placeholder' => 'http://your-link.com',
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
            ],
            'title_field' => '{{{ title }}}',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_process_2', [
            'label' => esc_attr__('Settings', 'cocobasic-elementor'),
                ]
        );


        $this->add_control(
                'speed', [
            'label' => esc_attr__('Speed (ms)', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('2000', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'auto_start', [
            'label' => esc_attr__('Auto Start', 'cocobasic-elementor'),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'true' => esc_attr__('True', 'cocobasic-elementor'),
                'false' => esc_attr__('Fasle', 'cocobasic-elementor'),
            ],
            'default' => 'true',
                ]
        );

        $this->add_control(
                'hover_pause', [
            'label' => esc_attr__('Pause on Hover', 'cocobasic-elementor'),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'true' => esc_attr__('True', 'cocobasic-elementor'),
                'false' => esc_attr__('Fasle', 'cocobasic-elementor'),
            ],
            'default' => 'true',
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
                'imgwidth', [
            'label' => esc_attr__('Image Width', 'cocobasic-elementor'),
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
                    'max' => 700,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .text-slider-wrapper img.text-slide-img' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'content_color', [
            'label' => esc_attr__('Content color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .text-slide-content' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'content_typography',
            'label' => esc_attr__('Content Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .text-slide-content',
                ]
        );

        $this->add_control(
                'name_color', [
            'label' => esc_attr__('Name color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .text-slide-name' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_attr__('Name Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .text-slide-name',
                ]
        );

        $this->add_control(
                'position_color', [
            'label' => esc_attr__('Position color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .text-slide-position' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'position_typography',
            'label' => esc_attr__('Position Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .text-slide-position',
                ]
        );

        $this->add_control(
                'quote_color', [
            'label' => esc_attr__('Quote color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .text-slider-header-quotes:before' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'dot_color', [
            'label' => esc_attr__('Pagination Dots Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .owl-theme .owl-dots .owl-dot span' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'active_dot_color', [
            'label' => esc_attr__('Active Pagination Dot Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .owl-theme .owl-dots .owl-dot.active' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .owl-theme .owl-dots .owl-dot:hover span' => 'background-color: {{VALUE}};',
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
            $name = $item['name'] ? $item['name'] : '';
            $position = $item['position'] ? $item['position'] : '';
            $description = $item['desc'] ? $item['desc'] : '';
            $img = $item['img']['id'] ? wp_get_attachment_image($item['img']['id'], '', '', ["class" => "text-slide-img"]) : '';
            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];
            $url = ( isset($url) && $url ) ? 'href=' . esc_url($url) . '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url . ' ' . $ext . ' ' . $nofollow;

            $out .= '<div class="text-slide"><p class="text-slide-content">' . $description . '</p>';
            if ($img != ''):
                if ($url != ''):
                    $out .= '<a ' . $link . '>' . $img . '</a>';
                else:
                    $out .= $img;
                endif;
            endif;

            $out .= '<p class="text-slide-name">' . $name . '</p><p class="text-slide-position">' . $position . '</p></div>';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_testimonial());
