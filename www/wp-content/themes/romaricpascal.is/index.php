<?php get_header(); ?>

<img src="<?php echo get_theme_file_uri('assets/images/photo.png'); ?>" alt="Picture of Romaric" /> 
<h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero rp-Underlined-landing">
  <?php echo get_post_meta($post->ID, 'page-greeting', true); ?>
</h1>
<div class="rp-HeroHeading">
  <?php echo get_post_meta($post->ID, 'page-message', true); ?>
</div>

<?php get_footer();?>
