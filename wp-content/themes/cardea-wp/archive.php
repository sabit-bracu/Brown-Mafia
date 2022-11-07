<?php get_header(); ?>
<div id="content" class="site-content">
    <div class="header-content center-relative block archive-title">
        <h1 class="entry-title"><?php echo esc_html(cardea_archive_title($title)); ?></h1>
    </div>

    <div class="blog-holder block center-relative">
        <?php while (have_posts()) : the_post(); ?>

            <article <?php post_class('relative blog-item-holder center-relative animate'); ?> >
                <?php if (has_post_thumbnail($post->ID)) : ?>         
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink($post->ID); ?>"><?php echo get_the_post_thumbnail($post->ID); ?></a>
                    </div>                            
                <?php endif; ?>        
                <div class="blog-item-text">
                    <h2 class="entry-title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title(); ?></a></h2>
                    <div class="entry-date published"><?php echo get_the_date(); ?></div>
                    <div class="cat-links">
                        <ul>
                            <?php
                            foreach ((get_the_category()) as $category) {
                                echo '<li><a href = "' . get_category_link($category->term_id) . '">' . $category->name . '</a></li > ';
                            }
                            ?>
                        </ul>
                    </div>                          
                </div>
            </article>
            <?php
        endwhile;
        echo '<div class="clear"></div>';
        echo '<div class="pagination-holder">';
        the_posts_pagination();
        echo '</div>';
        ?>
    </div>
</div>

<?php get_footer(); ?>