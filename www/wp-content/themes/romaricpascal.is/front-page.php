<?php 
	locate_template('partials/front-page/front-page-functions.php', true);
	the_post();
?>
<?php get_header(); ?>
<section class="rp-HomeSection u-flai-c" data-inview>
<div class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-greeting">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part">
  </span>
  <span class="rp-LetteredHeading__hi a-timing-greeting__I rp-LetteredHeading__part">Hi!
  </span>
  <span class="rp-LetteredHeading__im a-timing-greeting__III rp-LetteredHeading__part">I'm
  </span>
  <span class="rp-LetteredHeading__romaricArrow a-timing-greeting__II rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__romaric a-timing-greeting__II rp-LetteredHeading__part">Romaric.
  </span>
  <span class="rp-LetteredHeading__draw a-timing-greeting__V rp-LetteredHeading__part">I draw
  </span>
  <span class="rp-LetteredHeading__lettersArrow a-timing-greeting__IV rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__letters a-timing-greeting__IV rp-LetteredHeading__part">letters
  </span>
</div>
</section>
<?php get_template_part('partials/front-page/front-page','additional-sections'); ?>
<?php get_footer(); ?>