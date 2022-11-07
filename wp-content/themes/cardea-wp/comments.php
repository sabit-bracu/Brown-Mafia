<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-holder">	
    <?php if (have_comments()) : ?>
        <div id="comments-wrapper">
            <div class="block center-relative content-1170">
                <div class="single-content-wrapper center-relative">
                    <ol class="comments-list-holder">                 
                        <?php wp_list_comments(array('max_depth' => 4, 'avatar_size' => 48, 'callback' => 'coco_basic_theme_comment', 'short_ping' => true)); ?>  
                    </ol>

                    <div class="comments-pagination-wrapper top-20 bottom-20">
                        <div class="comments-pagination">
                            <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?> 
                        </div>
                    </div>                        
                </div>                        
                <div class="clear"></div>
            </div>                           
        </div>                               
    <?php endif; ?>  
    <?php
    if (comments_open()) :
        echo '<div class="comment-form-holder">';
        echo '<div class="block center-relative content-1170">';
        echo '<div class="single-content-wrapper center-relative">';

        if (!isset($aria_req)) {
            $aria_req = '';
        }
        comment_form(
                array('fields' => array(
                        'author' => '<input id="author" name="author" type="text" placeholder="' . esc_html__('Name', 'cardea-wp') . '" value="' . esc_attr($commenter['comment_author']) . '" size="20"' . $aria_req . ' />',
                        'email' => '<input id="email" name="email" type="text" placeholder="' . esc_html__('Email', 'cardea-wp') . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="20"' . $aria_req . ' />'
                    ),
                    'comment_field' => '<textarea id="comment" placeholder="' . esc_html__('Write Comment...', 'cardea-wp') . '" name="comment" cols="45" rows="12" aria-required="true"></textarea>',
                    'title_reply' => '',
                    'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    'label_submit' => esc_html__('Submit', 'cardea-wp')));
        echo '</div></div></div>';
    endif;

    function coco_basic_theme_comment($comment, $args, $depth) {
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="single-comment-holder">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php echo esc_html__('Your comment is awaiting moderation.', 'cardea-wp'); ?></em>
                    <br /> <br />
                <?php endif; ?>

                <?php
                $get_comment_ID = get_comment_ID();
                $comment_id = get_comment($get_comment_ID);
                $parent_comment_id = $comment_id->comment_parent;
                if ($parent_comment_id != 0) {
                    $get_parent_author_name = get_comment_author($parent_comment_id);
                }
                ?>

                <div class="float-left vcard">
                    <?php
                    if ($args['avatar_size'] != 0)
                        echo get_avatar($comment, 70);
                    ?>
                </div>
                <div class="comment-right-holder">
                    <ul class="comment-author-date-replay-holder">
                        <li class="comment-author">
                            <?php echo comment_author(); ?>
                        </li>                         
                    </ul>
                    <p class="comment-date">
                        <?php echo get_comment_date(); ?> <?php comment_reply_link(array_merge($args, array('add_below' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '- '))) ?>
                    </p>				
                    <div class="comment-text">
                        <?php
                        if ($parent_comment_id != 0) {
                            echo '<span class="replay-at-author">@' . esc_html($get_parent_author_name) . '</span>';
                        } comment_text();
                        ?>
                    </div>			
                </div>
                <div class="clear"></div>
            </div>              
        <?php } ?>
        <div class="clear"></div>
</div>