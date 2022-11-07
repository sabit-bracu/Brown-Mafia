<?php 
$speed = $settings['speed'] ? $settings['speed'] : '2000';
$auto_start = $settings['auto_start'] ? $settings['auto_start'] : 'true';
$hover_pause = $settings['hover_pause'] ? $settings['hover_pause'] : 'true';

?>

<div class="text-slider-wrapper relative">
    <div class="text-slider-header-quotes"></div>
    <div class="text-slider slider owl-carousel owl-theme" data-speed="<?php echo $speed; ?>" data-auto="<?php echo $auto_start; ?>" data-hover="<?php echo $hover_pause; ?>">
        <?php echo $this->content($settings['items']); ?> 
    </div>
    <div class="clear"></div>
</div>