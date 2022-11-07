<?php
$speed = $settings['speed'] ? $settings['speed'] : '2000';
$auto_start = $settings['auto_start'] ? $settings['auto_start'] : 'true';
$hover_pause = $settings['hover_pause'] ? $settings['hover_pause'] : 'true';
?>

<div class="image-slider-wrapper relative">
    <div class="owl-carousel owl-theme image-slider slider" data-speed="<?php echo $speed; ?>" data-auto="<?php echo $auto_start; ?>" data-hover="<?php echo $hover_pause; ?>">
        <?php echo $this->content($settings['items']); ?> 
    </div>
    <div class="clear"></div>
</div>