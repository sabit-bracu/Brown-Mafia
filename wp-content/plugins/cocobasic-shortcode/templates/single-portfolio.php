<?php get_header(); ?>
<div  <?php post_class('portfolio-item-wrapper center-relative'); ?>>
    <?php
		require ('ajax-single-portfolio.php');
    ?>
</div>
<?php get_footer(); ?>