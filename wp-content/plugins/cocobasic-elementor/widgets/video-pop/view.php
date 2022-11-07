<?php
$img = $settings['img']['id'] ? wp_get_attachment_image($settings['img']['id'], '', '', ["class" => "thumb"]) : '';
?>

<a class="video-popup-holder" href="<?php echo $settings['url']; ?>" data-rel="prettyPhoto[gallery-<?php echo $settings['name']; ?>]">
    <?php
    echo $img;
    if ($settings['play_img']['id']):
        echo wp_get_attachment_image($settings['play_img']['id'], '', '', ["class" => "popup-play"]);
    else:
        ?>
        <img class="popup-play" src="<?php echo PM_PLUGIN_URL . 'assets/img/play_btn.png'; ?>" alt="<?php echo __('Play', 'cocobasic-elementor'); ?>"/>    
    <?php
    endif;
    ?>

</a>

