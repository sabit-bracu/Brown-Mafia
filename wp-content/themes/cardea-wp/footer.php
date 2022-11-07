<!--Footer-->
<?php
$allowed_html_array = cardea_allowed_html();
?>

<?php
if ((get_theme_mod('cardea_select_footer') != '') && (function_exists('elementor_fail_php_version'))) :

    echo '<footer class="elementor-footer">';

    if (function_exists('cocobasic_custom_footer')):
        cocobasic_custom_footer();
    endif;

else:
    if ((get_theme_mod('cardea_footer_mail') != '') || (get_theme_mod('cardea_footer_tel') != '') || is_active_sidebar('footer-sidebar') || get_theme_mod('cardea_footer_social_content') != '' || get_theme_mod('cardea_footer_copyright_content') != ''):
        ?>       
        <footer class="footer elementor-footer">
            <div class="footer-content center-relative">
                <?php if (get_theme_mod('cardea_footer_mail') != ''): ?>
                    <div class="footer-mail">            
                        <?php
                        if (get_theme_mod('cardea_footer_mail') != ''):
                            echo wp_kses(__(get_theme_mod('cardea_footer_mail') ? get_theme_mod('cardea_footer_mail') : '<a href="#">hello@yoursite.com</a>', 'cardea-wp'), $allowed_html_array);
                        endif;
                        ?>               
                    </div>
                <?php endif; ?>

                <?php if (get_theme_mod('cardea_footer_tel') != ''): ?>
                    <div class="footer-number">            
                        <?php
                        if (get_theme_mod('cardea_footer_tel') != ''):
                            echo wp_kses(__(get_theme_mod('cardea_footer_tel') ? get_theme_mod('cardea_footer_tel') : '<a href="#">987.654.321</a>', 'cardea-wp'), $allowed_html_array);
                        endif;
                        ?>               
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-sidebar')) : ?>
                    <ul id="footer-sidebar">
                        <?php dynamic_sidebar('footer-sidebar'); ?>
                    </ul>
                <?php endif; ?>  

                <?php if (get_theme_mod('cardea_footer_info_content') != ''): ?>
                    <div class="footer-info">
                        <?php
                        echo wp_kses(__(get_theme_mod('cardea_footer_info_content') ? get_theme_mod('cardea_footer_info_content') : 'New York', 'cardea-wp'), $allowed_html_array);
                        ?>
                    </div>
                <?php endif; ?>


                <?php if (get_theme_mod('cardea_footer_social_content') != ''): ?>
                    <div class="social-holder">
                        <?php
                        echo wp_kses(__(get_theme_mod('cardea_footer_social_content') ? get_theme_mod('cardea_footer_social_content') : '<a href="#"><span class="fa fa-twitter"></span></a><a href="#"><span class="fa fa-facebook"></span></a><a href="#"><span class="fa fa-behance"></span></a><a href="#"><span class="fa fa-dribbble"></span></a>', 'cardea-wp'), $allowed_html_array);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (get_theme_mod('cardea_footer_copyright_content') != ''): ?>
                    <div class="copyright-holder">
                        <?php
                        echo wp_kses(__(get_theme_mod('cardea_footer_copyright_content') ? get_theme_mod('cardea_footer_copyright_content') : '2017 Colorius WordPress Theme by CocoBasic.', 'cardea-wp'), $allowed_html_array);
                        ?>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>
    <?php endif; ?>
</footer>
</div>

<?php wp_footer();
?>
</body>
</html>