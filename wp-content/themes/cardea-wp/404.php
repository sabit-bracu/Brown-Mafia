<?php get_header(); ?>
            <p class="center-text error-text-404"><?php echo esc_html__('404', 'cardea-wp');?></p>
            <p class="center-text error-text-help"><?php echo esc_html__('Nothing was found at this location. Maybe try a search?', 'cardea-wp');?></p>
            <div class="center-text error-search-holder"><?php get_search_form(); ?></div>
            <p class="center-text error-text-home"><?php echo esc_html__('... or just go safe', 'cardea-wp');?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'cardea-wp');?></a></p>            
<?php get_footer(); ?>