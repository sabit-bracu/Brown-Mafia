<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_portfolio extends Widget_Base {

    public function get_name() {
        return 'coco-portfolio';
    }

    public function get_title() {
        return esc_attr__('Portfolio', 'cocobasic-elementor');
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
            'label' => esc_attr__('Number of items before laod more', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('5', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'show_filter', [
            'label' => esc_attr__('Show Filter', 'cocobasic-elementor'),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'true' => esc_attr__('Yes', 'cocobasic-elementor'),
                'false' => esc_attr__('No', 'cocobasic-elementor'),
            ],
            'default' => 'false',
                ]
        );

        $this->add_control(
                'all_text', [
            'label' => esc_attr__('"All" text in the Filter', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('All', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'item_border_radius', [
            'label' => esc_attr__('Item border radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} .grid-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );


        $this->add_responsive_control(
                'space_between_items', [
            'label' => esc_attr__('Space between items', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .grid-item' => 'border: {{SIZE}}{{UNIT}} solid transparent;',
            ],
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
                '{{WRAPPER}} .grid-item a.item-link:after' => 'background-color: {{VALUE}};',
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
                '{{WRAPPER}} a.item-link:before' => 'border-width: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} a.item-link:before' => 'top: {{SIZE}}{{UNIT}}; left: {{SIZE}}{{UNIT}}; right: {{SIZE}}{{UNIT}}; bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'borderwidth_color', [
            'label' => esc_attr__('Overlay border color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} a.item-link:before' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'border_radius', [
            'label' => esc_attr__('Overlay border radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} a.item-link:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => esc_attr__('Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .portfolio-title',
                ]
        );

        $this->add_control(
                'subtitle_color', [
            'label' => esc_attr__('Sub Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-desc' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_attr__('Sub Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .portfolio-desc',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'section_loadmore_button', [
            'label' => esc_attr__('Load More Button', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );


        $this->add_responsive_control(
                'lodadmore_width', [
            'label' => esc_attr__('Load more width', 'cocobasic-elementor'),
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
            'size_units' => [ '%', 'px', 'vw'],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1500,
                ],
                'vw' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio-holder' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'loadmore_border_radius', [
            'label' => esc_attr__('Load More Border Radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio-holder p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'loadmore_margin', [
            'label' => esc_attr__('Load more margin top', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .more-posts-portfolio-holder' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'loadmore_background', [
            'label' => esc_attr__('Load More Background', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .no-more-posts-portfolio' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .more-posts-portfolio-loading' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'loadmore_img', [
            'label' => esc_attr__('Load More Image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );

        $this->add_responsive_control(
                'loadmore_img_space', [
            'label' => esc_attr__('Load more image space', 'cocobasic-elementor'),
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
                    'min' => 1,
                    'max' => 50,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio img' => 'margin: {{SIZE}}{{UNIT}} 0;',
                '{{WRAPPER}} .no-more-posts-portfolio img' => 'margin: {{SIZE}}{{UNIT}} 0;',
                '{{WRAPPER}} .more-posts-portfolio-loading img' => 'margin: {{SIZE}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->add_responsive_control(
                'loadmore_image_width', [
            'label' => esc_attr__('Load More Image Width', 'cocobasic-elementor'),
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
            'size_units' => [ '%', 'px', 'vw'],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
                'vw' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                '{{WRAPPER}} .no-more-posts-portfolio img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                '{{WRAPPER}} .more-posts-portfolio-loading img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
            ],
                ]
        );


        $this->add_control(
                'loadmore_text', [
            'label' => esc_attr__('Text for "load more" instead of image', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
                ]
        );

        $this->add_control(
                'loadmore_loading_text', [
            'label' => esc_attr__('Text for "Loading" instead of image', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
                ]
        );

        $this->add_control(
                'loadmore_nomore_text', [
            'label' => esc_attr__('Text for "No more" instead of image', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '',
                ]
        );

        $this->add_control(
                'loadmore_text_color', [
            'label' => esc_attr__('Load more text color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio-holder' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'loadmore_text_typography',
            'label' => esc_attr__('Load More Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .more-posts-portfolio-holder',
                ]
        );

        $this->add_responsive_control(
                'loadmore_borderwidth', [
            'label' => esc_attr__('Load More Border Width', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .more-posts-portfolio' => 'border: {{SIZE}}{{UNIT}} solid;',
                '{{WRAPPER}} .no-more-posts-portfolio' => 'border: {{SIZE}}{{UNIT}} solid;',
                '{{WRAPPER}} .more-posts-portfolio-loading' => 'border: {{SIZE}}{{UNIT}} solid;',
            ],
                ]
        );

        $this->add_responsive_control(
                'loadmore_text_space', [
            'label' => esc_attr__('Load more text button height', 'cocobasic-elementor'),
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
                '{{WRAPPER}} .more-posts-portfolio' => 'padding: {{SIZE}}{{UNIT}} 0;',
                '{{WRAPPER}} .no-more-posts-portfolio' => 'padding: {{SIZE}}{{UNIT}} 0; ',
                '{{WRAPPER}} .more-posts-portfolio-loading' => 'padding: {{SIZE}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_portfolio_back', [
            'label' => esc_attr__('Portfolio Go Back Button', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'portfolio_back_color', [
            'label' => esc_attr__('Portfolio "Go Back" background color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .close-icon' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'portfolio_back_radius', [
            'label' => esc_attr__('Portfolio "Go Back" radius', 'cocobasic-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%'],
            'selectors' => [
                '{{WRAPPER}} .close-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'portfolio_back_image', [
            'label' => esc_attr__('Portfolio "Go Back" image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );

        $this->add_control(
                'portfolio_back_image_width', [
            'label' => esc_attr__('Portfolio "Go Back" image size', 'cocobasic-elementor'),
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
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .close-icon' => 'background-size: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_filter', [
            'label' => esc_attr__('Filter / Category', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'category_background_color', [
            'label' => esc_attr__('Category background color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #portfolio-wrapper .category-filter-list > div' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'category_active_color', [
            'label' => esc_attr__('Category active background color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #portfolio-wrapper .category-filter-list > div.is-checked' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} #portfolio-wrapper .category-filter-list > div:hover' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'category_color', [
            'label' => esc_attr__('Category color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} #portfolio-wrapper .category-filter-list > div' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'category_typography',
            'label' => esc_attr__('Category Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} #portfolio-wrapper .category-filter-list > div',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_portfolio());
