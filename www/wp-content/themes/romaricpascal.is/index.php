<?php get_header(); ?>

<div class="rp-Home">
<div class="rp-SpeakingPortrait">
<h1 class="rp-LetteredHeading rp-Home__greeting rp-SpeechHi">
  <span class="rp-SpeechHi__hi">Hi!</span>
  <span class="rp-SpeechHi__im">I'm</span>
  <span class="rp-SpeechHi__romaric">Romaric</span>
</h1>
<img class="rp-SpeakingPortrait__portrait" src="<?php echo get_theme_file_uri('assets/images/photo.png'); ?>" alt="That's me" title="That's me :)" />
<div class="rp-LetteredHeading rp-Home__message">
  <?php echo get_post_meta($post->ID, 'page-message', true); ?>
</div>
</div>
</div>

<?php get_footer();?>
