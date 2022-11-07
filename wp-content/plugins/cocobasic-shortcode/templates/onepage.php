<?php
/*
  Template Name: OnePage
 */
?>

<?php get_header(); ?>
<div id="content" class="site-content center-relative">        
    <?php
    $args = array('post_type' => 'page', 'posts_per_page' => '-1', 'orderby' => 'menu_order', 'order' => 'ASC', 'meta_query' => array(array('key' => 'page_structure', 'value' => '2', 'compare' => '=')));
    $loop = new WP_Query($args);
    $totalPages = $loop->post_count;
    $allowed_html_array = cocobasic_allowed_plugin_html();
    $numCounter = 0;
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $slug = $post->post_name;
            $curentPostID = $post->ID;
            $numCounter++;

            if (get_post_meta($post->ID, "page_title_position", true) == 'right'):
                $title_position = 'float-right';
                $content_position = 'float-left';
            else:
                $title_position = 'float-left';
                $content_position = 'float-right';
            endif;


            $class = 'section ';
            if (get_post_meta($post->ID, "page_full_screen", true) == 'yes'):
                $class .= 'full-screen ';
            endif;

            if (get_post_meta($post->ID, "page_padding", true) == 'no'):
                $class .= 'no-padding ';
            endif;


            if (get_page_template_slug($curentPostID) === 'page-split.php'):
                ?>
                <div id="<?php echo $slug; ?>" <?php post_class($class . 'page-split'); ?>>                   
                    <div class="section-wrapper block content-1170 center-relative">                          
                        <div class="bg-holder <?php echo $title_position; ?>">                            
                            <div class="split-color"></div>
                        </div>   
                        <div class="sticky-spacer">
                            <div class="section-title-holder <?php echo $title_position; ?>">                              
                                <?php if (get_post_meta($curentPostID, "page_top_img", true) != ''): ?>
                                    <div class="section-top-image">
                                        <img src="<?php echo esc_url(get_post_meta($curentPostID, "page_top_img", true)); ?>" alt="" />
                                    </div>   
                                <?php endif; ?>
                                <?php if (get_post_meta($curentPostID, "page_show_title", true) != 'no'): ?>
                                    <h2 class="entry-title">
                                        <?php
                                        if (get_post_meta($curentPostID, "page_custom_title", true) != '') {
                                            echo do_shortcode(wp_kses(get_post_meta($curentPostID, "page_custom_title", true), $allowed_html_array));
                                        } else {
                                            echo get_the_title();
                                        }
                                        ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (get_post_meta($post->ID, "page_description", true) != ''): ?>
                                    <p class="page-desc">
                                        <?php echo do_shortcode(wp_kses(get_post_meta($post->ID, "page_description", true), $allowed_html_array)); ?>
                                    </p>
                                <?php endif; ?>
                            </div>                        
                        </div>
                        <div class="section-content-holder <?php echo $content_position; ?>">
                            <div class="content-wrapper">                                
                                <?php the_content(); ?>    
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>     


                <?php
            elseif ((get_page_template_slug($curentPostID) === 'elementor_header_footer') || (get_page_template_slug($curentPostID) === 'elementor_canvas')): // is Elementor Template                 
                $class .= 'elementor-editor-section elementor-page-' . $curentPostID . ' page-id-' . $curentPostID;
                ?> 

                <div id="<?php echo $slug; ?>" <?php post_class($class); ?>>                                       
                        <div class="content-wrapper">                         
                            <?php the_content(); ?>    
                        </div>
                        <div class="clear"></div>                    
                </div> 

                <?php
            else: // default
                $class .= ' full-width';
                ?>
                <div id="<?php echo $slug; ?>" <?php post_class($class); ?>>                   
                    <div class="section-wrapper block content-1170 center-relative">                                                
                        <div class="content-wrapper">
                            <?php if (get_post_meta($curentPostID, "page_show_title", true) != 'no'): ?>
                                <h2 class="entry-title">
                                    <?php
                                    if (get_post_meta($curentPostID, "page_custom_title", true) != '') {
                                        echo do_shortcode(wp_kses(get_post_meta($curentPostID, "page_custom_title", true), $allowed_html_array));
                                    } else {
                                        echo get_the_title();
                                    }
                                    ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (get_post_meta($post->ID, "page_description", true) != ''): ?>
                                <p class="page-desc">
                                    <?php echo do_shortcode(wp_kses(get_post_meta($post->ID, "page_description", true), $allowed_html_array)); ?>
                                </p>
                            <?php endif; ?>
                            <?php the_content(); ?>    
                        </div>
                        <div class="clear"></div>
                    </div>
                </div> 
            <?php
            endif;
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>
<?php get_footer(); ?>