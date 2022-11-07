<?php

$img = $settings['img']['id'] ? wp_get_attachment_image($settings['img']['id'], 'full') : '';
$title = $settings['title'] ? '<h4>'.$settings['title']. '</h4>' : '';
$desc = $settings['desc'] ? $settings['desc'] : '';

$url = $settings['url']['url'];
$ext = $settings['url']['is_external'];
$nofollow = $settings['url']['nofollow'];
$url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
$ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
$nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
$link = $url.' '.$ext.' '.$nofollow;

$ftimg = $url ? '<a '.$link.'>'.$img.'</a>' : $img;

?>

<div class="service-holder ">
    <div class="service-img">
     <?php echo $ftimg;?>
    </div>
    <div class="service-txt">
     <?php echo $title.$desc; ?>
    </div>
</div>