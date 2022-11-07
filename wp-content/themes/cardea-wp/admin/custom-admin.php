<?php
/*
 * Register Theme Customizer
 */

add_action('customize_register', 'cardea_theme_customize_register');

function cardea_theme_customize_register($wp_customize) {

    function cardea_clean_html($value) {
        $allowed_html_array = cardea_allowed_html();
        $value = wp_kses($value, $allowed_html_array);
        return $value;
    }

    function cardea_sanitize_select($input, $setting) {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    class CardeaWP_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="10" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }

    //----------------------------- IMAGE SECTION  ---------------------------------------------



    $wp_customize->add_section('cardea_image_section', array(
        'title' => esc_html__('Images Section', 'cardea-wp'),
        'priority' => 33
    ));


    $wp_customize->add_setting('cardea_preloader', array(
        'default' => get_template_directory_uri() . '/images/preloader.gif',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cardea_preloader', array(
        'label' => esc_html__('Preloader Gif', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_preloader'
    )));



    $wp_customize->add_setting('cardea_preloader_width', array(
        'default' => "64px",
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control('cardea_preloader_width', array(
        'label' => esc_html__('Preloader Width:', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_preloader_width'
    ));



    $wp_customize->add_setting('cardea_preloader_height', array(
        'default' => "64px",
        'sanitize_callback' => 'cardea_clean_html'
    ));

    $wp_customize->add_control('cardea_preloader_height', array(
        'label' => esc_html__('Preloader Height:', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_preloader_height'
    ));


    $wp_customize->add_setting('cardea_header_logo', array(
        'default' => get_template_directory_uri() . '/images/logo.png',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cardea_header_logo', array(
        'label' => esc_html__('Header Logo', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_header_logo'
    )));



    $wp_customize->add_setting('cardea_logo_width', array(
        'default' => "120px",
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control('cardea_logo_width', array(
        'label' => esc_html__('Header Logo Width:', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_logo_width'
    ));



    $wp_customize->add_setting('cardea_logo_height', array(
        'default' => "30px",
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control('cardea_logo_height', array(
        'label' => esc_html__('Header Logo Height:', 'cardea-wp'),
        'section' => 'cardea_image_section',
        'settings' => 'cardea_logo_height'
    ));


    //----------------------------- END IMAGE SECTION  ---------------------------------------------
    //
    //
    //
    //----------------------------------COLORS SECTION--------------------



    $wp_customize->add_setting('cardea_preloader_background_color', array(
        'default' => '#080808',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_preloader_background_color', array(
        'label' => esc_html__('Preloader Background Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_preloader_background_color'
    )));



    $wp_customize->add_setting('cardea_body_background_color', array(
        'default' => '#1e1e1e',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_body_background_color', array(
        'label' => esc_html__('Body Background Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_body_background_color'
    )));



    $wp_customize->add_setting('cardea_menu_background_color', array(
        'default' => '#060606',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_menu_background_color', array(
        'label' => esc_html__('Menu Background Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_menu_background_color'
    )));



    $wp_customize->add_setting('cardea_menu_color', array(
        'default' => '#ffffff',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_menu_color', array(
        'label' => esc_html__('Menu Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_menu_color'
    )));



    $wp_customize->add_setting('cardea_menu_hover_color', array(
        'default' => '#ff1e5c',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_menu_hover_color', array(
        'label' => esc_html__('Menu Hover Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_menu_hover_color'
    )));



    $wp_customize->add_setting('cardea_global_color', array(
        'default' => '#f1576b',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_global_color', array(
        'label' => esc_html__('Global Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_global_color'
    )));



    $wp_customize->add_setting('cardea_footer_background', array(
        'default' => '#000000',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cardea_footer_background', array(
        'label' => esc_html__('Footer Background Color', 'cardea-wp'),
        'section' => 'colors',
        'settings' => 'cardea_footer_background'
    )));




    //----------------------------------------------------------------------------------------------
    //
    //
    //
     //------------------------- FOOTER TEXT SECTION ---------------------------------------------



    $wp_customize->add_section('cardea_footer_text_section', array(
        'title' => esc_html__('Footer', 'cardea-wp'),
        'priority' => 99
    ));



    if (function_exists('elementor_fail_php_version')) {

        $wp_customize->add_setting('cardea_select_footer', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cardea_sanitize_select',
            'default' => '',
        ));


        $wp_customize->add_control('cardea_select_footer', array(
            'type' => 'select',
            'section' => 'cardea_footer_text_section',
            'label' => esc_html__('Custom footer layout', 'cardea-wp'),
            'description' => esc_html__('select one of Elementor templates or leave it blank and use default fields bellow', 'cardea-wp'),
            'choices' => cardea_create_footer_list()
        ));
    }


    $wp_customize->add_setting('cardea_footer_mail', array(
        'default' => '',
        'sanitize_callback' => 'cardea_clean_html'
    ));


    $wp_customize->add_control(new CardeaWP_Customize_Textarea_Control($wp_customize, 'cardea_footer_mail', array(
        'label' => esc_html__('Footer Mail', 'cardea-wp'),
        'section' => 'cardea_footer_text_section',
        'settings' => 'cardea_footer_mail',
        'priority' => 999
    )));


    $wp_customize->add_setting('cardea_footer_tel', array(
        'default' => '',
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control(new CardeaWP_Customize_Textarea_Control($wp_customize, 'cardea_footer_tel', array(
        'label' => esc_html__('Footer Phone Number', 'cardea-wp'),
        'section' => 'cardea_footer_text_section',
        'settings' => 'cardea_footer_tel',
        'priority' => 999
    )));



    $wp_customize->add_setting('cardea_footer_info_content', array(
        'default' => '',
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control(new CardeaWP_Customize_Textarea_Control($wp_customize, 'cardea_footer_info_content', array(
        'label' => esc_html__('Footer Info Content', 'cardea-wp'),
        'section' => 'cardea_footer_text_section',
        'settings' => 'cardea_footer_info_content',
        'priority' => 999
    )));


    $wp_customize->add_setting('cardea_footer_social_content', array(
        'default' => '',
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control(new CardeaWP_Customize_Textarea_Control($wp_customize, 'cardea_footer_social_content', array(
        'label' => esc_html__('Footer Social Content', 'cardea-wp'),
        'section' => 'cardea_footer_text_section',
        'settings' => 'cardea_footer_social_content',
        'priority' => 999
    )));



    $wp_customize->add_setting('cardea_footer_copyright_content', array(
        'default' => '',
        'sanitize_callback' => 'cardea_clean_html'
    ));



    $wp_customize->add_control(new CardeaWP_Customize_Textarea_Control($wp_customize, 'cardea_footer_copyright_content', array(
        'label' => esc_html__('Footer Copyright Content:', 'cardea-wp'),
        'section' => 'cardea_footer_text_section',
        'settings' => 'cardea_footer_copyright_content',
        'priority' => 999
    )));




    //---------------------------- END FOOTER TEXT SECTION --------------------------
    //
    //    
    //
    //
    //
    //------------------------- MENU LAYOUT SECTION ---------------------------------------------



    $wp_customize->add_section('cardea_menu_layout_section', array(
        'title' => esc_html__('Menu Layout', 'cardea-wp'),
        'priority' => 99
    ));



    $wp_customize->add_setting('cardea_menu_layout', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cardea_sanitize_select',
        'default' => 'top-menu-layout',
    ));



    $wp_customize->add_control('cardea_menu_layout', array(
        'type' => 'select',
        'section' => 'cardea_menu_layout_section',
        'label' => esc_html__('Select menu layout', 'cardea-wp'),
        'description' => '',
        'choices' => array(
            'top-menu-layout' => esc_html__('Top Menu', 'cardea-wp'),
            'left-menu-layout' => esc_html__('Left Menu', 'cardea-wp'),
            'right-menu-layout' => esc_html__('Right Menu', 'cardea-wp'),
        ),
    ));



    $wp_customize->add_setting('cardea_menu_color_on_top', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cardea_sanitize_select',
        'default' => 'solid-menu',
    ));

    $wp_customize->add_control('cardea_menu_color_on_top', array(
        'type' => 'select',
        'section' => 'cardea_menu_layout_section',
        'label' => esc_html__('Menu color on top', 'cardea-wp'),
        'description' => '',
        'choices' => array(
            'solid-menu' => esc_html__('Solid color', 'cardea-wp'),
            'transparent-menu' => esc_html__('Transparent', 'cardea-wp'),
        ),
    ));


    //--------------------------------------------------------------------------
    $wp_customize->get_setting('cardea_menu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cardea_menu_hover_color')->transport = 'postMessage';
    $wp_customize->get_setting('cardea_menu_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cardea_global_color')->transport = 'postMessage';
    $wp_customize->get_setting('cardea_footer_background')->transport = 'postMessage';
    $wp_customize->get_setting('cardea_preloader_background_color')->transport = 'postMessage';

    //--------------------------------------------------------------------------

    /*
     * If preview mode is active, hook JavaScript to preview changes
     */

    if ($wp_customize->is_preview() && !is_admin()) {

        add_action('customize_preview_init', 'cardea_theme_customize_preview_js');
    }
}

/**
 * Bind Theme Customizer JavaScript
 */
function cardea_theme_customize_preview_js() {

    wp_enqueue_script('cardea-wp-theme-customizer', get_template_directory_uri() . '/admin/js/custom-admin.js', array('customize-preview'), '20120910', true);
}

/*
 * Generate CSS Styles
 */

class CardeaWPLiveCSS {

    public static function cardea_theme_customized_style() {

        echo '<style type="text/css">' .
        //Body Background

        cardea_generate_css('body', 'background-color', 'cardea_body_background_color', '', '!important') .
        //Menu Color, Hover Color and Background Color        

        cardea_generate_css('body .site-wrapper .sm-clean a', 'color', 'cardea_menu_color', '', '!important') .
        cardea_generate_css('body .site-wrapper .sm-clean a:hover, body .site-wrapper .main-menu.sm-clean .sub-menu li a:hover, body .site-wrapper .sm-clean li.active a, body .site-wrapper .sm-clean li.current-page-ancestor > a, body .site-wrapper .sm-clean li.current_page_ancestor > a, body .site-wrapper .sm-clean li.current_page_item > a', 'color', 'cardea_menu_hover_color', '', '!important') .
        cardea_generate_css('.site-wrapper .header-holder, .site-wrapper .menu-holder, .site-wrapper .sm-clean ul, .transparent-menu.page-template-onepage .site-wrapper .header-holder.is-sticky', 'background-color', 'cardea_menu_background_color') .
        //Global Color

        cardea_generate_css('body .site-wrapper a, body .site-wrapper a:hover, .site-wrapper blockquote:before, .site-wrapper .blog-item-holder .cat-links ul a, .site-wrapper .navigation.pagination a:hover, .site-wrapper blockquote:not(.cocobasic-block-pullquote):before, .single .site-wrapper .entry-info .cat-links li:after, .site-wrapper .tags-holder a, .single .site-wrapper .wp-link-pages, .site-wrapper .comment-form-holder a:hover, .site-wrapper .replay-at-author, body .site-wrapper .footer a:hover', 'color', 'cardea_global_color') .
        cardea_generate_css('.blog .site-wrapper .more-posts, .blog .site-wrapper .no-more-posts, .blog .site-wrapper .more-posts-loading, .site-wrapper .navigation.pagination .current, .site-wrapper .tags-holder a:hover, .search .site-wrapper h1.entry-title, .archive .site-wrapper h1.entry-title', 'background-color', 'cardea_global_color') .
        cardea_generate_css('.site-wrapper .tags-holder a', 'border-color', 'cardea_global_color') .
        //Footer Color

        cardea_generate_css('.site-wrapper .footer', 'background-color', 'cardea_footer_background') .
        //Preloader Background Color

        cardea_generate_css('.site-wrapper .doc-loader', 'background-color', 'cardea_preloader_background_color') .
        cardea_generate_additional_css() .
        '</style>';
    }

}

/*
 * Generate CSS Class - Helper Method
 */

function cardea_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $rgba = '') {

    $return = '';

    $mod = get_option($mod_name);

    if (!empty($mod)) {

        if ($rgba === true) {

            $mod = '0px 0px 50px 0px ' . cardea_hex2rgba($mod, 0.65);
        }

        $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix
        );
    }

    return $return;
}

function cardea_hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';
    //Return default if no color provided
    if (empty($color))
        return $default;
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb

    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)

    if ($opacity) {

        if (abs($opacity) > 1)
            $opacity = 1.0;

        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {

        $output = 'rgb(' . implode(",", $rgb) . ')';
    }
    //Return rgb(a) color string
    return $output;
}

function cardea_generate_additional_css() {

    $allowed_html_array = cardea_allowed_html();

    $return = '';

    if (get_theme_mod('cardea_preloader_width') != '' || get_theme_mod('cardea_preloader_height') != ''):

        $return .= '.site-wrapper .doc-loader img{width: ' . get_theme_mod('cardea_preloader_width') . '; height: ' . get_theme_mod('cardea_preloader_height') . ';}';

    endif;

    if (get_theme_mod('cardea_logo_width') != '' || get_theme_mod('cardea_logo_height') != ''):

        $return .= '.site-wrapper .header-logo img{width: ' . get_theme_mod('cardea_logo_width') . '; height: ' . get_theme_mod('cardea_logo_height') . ';}';

    endif;

    $return = wp_kses($return, $allowed_html_array);

    return $return;
}

function cardea_create_footer_list() {

    $listArray = ['' => ''];

    global $post;

    $elementorLoop = new WP_Query(array(
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
        'posts_per_page' => '-1'
    ));

    while ($elementorLoop->have_posts()) : $elementorLoop->the_post();
        $listArray += [ $post->ID => $post->post_name];
    endwhile;

    wp_reset_query();

    return $listArray;
}
?>