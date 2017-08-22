<?php 
	locate_template('partials/front-page/front-page-functions.php', true);
	the_post();
?>
<?php get_header(); ?>
<section class="rp-HomeSection">
<div class="rp-LetteredHeading rp-LetteredHeading-greeting">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part">
  </span>
  <span class="rp-LetteredHeading__hi rp-LetteredHeading__part">Hi!
  </span>
  <span class="rp-LetteredHeading__im rp-LetteredHeading__part">I'm
  </span>
  <span class="rp-LetteredHeading__romaric rp-LetteredHeading__part">Romaric.
  </span>
  <span class="rp-LetteredHeading__romaricArrow rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__draw rp-LetteredHeading__part">I draw
  </span>
  <span class="rp-LetteredHeading__letters rp-LetteredHeading__part">letters
  </span>
  <span class="rp-LetteredHeading__lettersArrow rp-LetteredHeading__part"></span>
</div>
</section>
<?php get_template_part('partials/front-page/front-page','additional-sections'); ?>
<?php get_footer(); ?>