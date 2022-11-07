<?php

$num = $settings['num'] ? $settings['num'] : '5';
$loadMoreImg = $settings['loadmore_img']['id'] ? wp_get_attachment_image($settings['loadmore_img']['id'], 'full') : '';
$loadmore_text = $settings['loadmore_text'] ? $settings['loadmore_text'] : '';
$loadmore_loading_text = $settings['loadmore_loading_text'] ? $settings['loadmore_loading_text'] : '';
$loadmore_nomore_text = $settings['loadmore_nomore_text'] ? $settings['loadmore_nomore_text'] : '';
$all_text = $settings['all_text'] ? $settings['all_text'] : 'All';
$show_filter = $settings['show_filter'] ? $settings['show_filter'] : 'false';

$goBackImg = $settings['portfolio_back_image']['id'] ? $settings['portfolio_back_image']['url'] : PM_PLUGIN_URL . 'assets/img/close-left-arrow.png';

if ($loadmore_text !== '') {
    $loadMore = $loadmore_text;
} else if ($loadMoreImg !== '') {
    $loadMore = $loadMoreImg;
}

if ($loadmore_loading_text !== '') {
    $loadingMore = $loadmore_loading_text;
} else if ($loadMoreImg !== '') {
    $loadingMore = $loadMoreImg;
}

if ($loadmore_nomore_text !== '') {
    $loadingNoMore = $loadmore_nomore_text;
} else if ($loadMoreImg !== '') {
    $loadingNoMore = $loadMoreImg;
}

$return = '<div id="portfolio-wrapper" data-gobackimg="' . $goBackImg . '">';

if ($show_filter === 'true') {
    $return .= '<div class="category-filter-list button-group filters-button-group">
                <div class="button is-checked" data-filter="*">' . $all_text . '</div>
                ' . cocobasic_drop_cats_filter() . '
            </div>';
}

$return .= '<div class="portfolio-load-content-holder"></div>';
global $post;
$args = array('post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => $num);
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    $return .= '<div class="grid" id="portfolio-grid"><div class="gutter-sizer"></div><div class="grid-sizer"></div>';
    while ($loop->have_posts()) : $loop->the_post();
        if (has_post_thumbnail($post->ID)) {
            $portfolio_post_thumb = get_the_post_thumbnail();
        } else {
            $portfolio_post_thumb = '<img src = "' . plugin_dir_url(__FILE__) . '/images/no-photo.png" alt = "" />';
        }

        $p_size = get_post_meta($post->ID, "portfolio_thumb_image_size", true);

        if (get_post_meta($post->ID, "portfolio_hover_thumb_title", true) != ''):
            $p_thumb_title = get_post_meta($post->ID, "portfolio_hover_thumb_title", true);
        else:
            $p_thumb_title = get_the_title();
        endif;

        $p_thumb_text = get_post_meta($post->ID, "portfolio_hover_thumb_text", true);
        $link_thumb_to = get_post_meta($post->ID, "portfolio_link_item_to", true);
        $item_margin = '';

        if (get_post_meta($post->ID, "portfolio_item_margin", true) !== ''):
            $item_margin = 'data-pmargin="' . get_post_meta($post->ID, "portfolio_item_margin", true) . '"';
        else:
            $item_margin = 'data-pmargin="0 0 0 0"';
        endif;

        switch ($link_thumb_to):
            case 'link_to_image_url':
                $image_popup = get_post_meta($post->ID, "portfolio_image_popup", true);
                $return .= '<div class="grid-item element-item ' . $p_size . ' ' . cocobasic_drop_cats_slug($post->ID) . '" ' . $item_margin . '><a class="item-link" href="' . $image_popup . '" data-rel="prettyPhoto[gallery1]">';
                break;
            case 'link_to_video_url':
                $video_popup = get_post_meta($post->ID, "portfolio_video_popup", true);
                $return .= '<div class="grid-item element-item ' . $p_size . ' ' . cocobasic_drop_cats_slug($post->ID) . '" ' . $item_margin . '><a class="item-link" href="' . $video_popup . '" data-rel="prettyPhoto[gallery1]">';
                break;
            case 'link_to_extern_url':
                $extern_site_url = get_post_meta($post->ID, "portfolio_extern_site_url", true);
                $return .= '<div class="grid-item element-item ' . $p_size . ' ' . cocobasic_drop_cats_slug($post->ID) . '" ' . $item_margin . '><a class="item-link" href="' . $extern_site_url . '" target="_blank">';
                break;

            default:
                $return .= '<div id="p-item-' . $post->ID . '" class="grid-item element-item ' . $p_size . ' ' . cocobasic_drop_cats_slug($post->ID) . '" ' . $item_margin . '><a class="item-link ajax-portfolio" href="' . get_permalink() . '" data-id="' . $post->ID . '">';
        endswitch;

        $return .= $portfolio_post_thumb . '<div class="portfolio-text-holder"><p class="portfolio-title" ' . $item_margin . '>' . $p_thumb_title . '</p><p class="portfolio-desc">' . $p_thumb_text . '</p></div></a></div>';

    endwhile;

    $return .= '</div>';
endif;
$return .= '<div class="clear"></div></div><div class = "block center-relative center-text more-posts-portfolio-holder"><p class="more-posts-portfolio">' . $loadMore . '</p><p class="more-posts-portfolio-loading">' . $loadingMore . '</p><p class="no-more-posts-portfolio">' . $loadingNoMore . '</p></div>';
wp_reset_postdata();
echo $return;
?>