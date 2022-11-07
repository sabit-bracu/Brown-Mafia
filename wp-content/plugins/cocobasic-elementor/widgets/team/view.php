<?php

$num = $settings['num'] ? $settings['num'] : 'one_third';

$return = '<div id="team-holder"><div class="team-load-content-holder"></div>';

global $post;
$args = array('post_type' => 'team', 'post_status' => 'publish', 'posts_per_page' => '-1');
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    $return .= '<ul class="member-holder-wrapper">';
    while ($loop->have_posts()) : $loop->the_post();
        $return .= '<li id="t-item-' . $post->ID . '" class="member-holder ' . $num . '"><a class="img-link" href="' . get_permalink() . '" data-id="' . $post->ID . '">' . get_the_post_thumbnail() . '<div class="member-mask"><div class="member-info-holder"><p class="member-name">' . get_the_title() . '</p><p class="member-position">' . get_post_meta($post->ID, "team_member_position", true) . '</p></div></div></a></li>';
    endwhile;
    $return .= '</ul>';
endif;
$return .= '<div class="clear"></div></div>';
wp_reset_postdata();

echo $return;
