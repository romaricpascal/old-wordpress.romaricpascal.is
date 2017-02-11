<?php
/*
Template Name: Sharing page
*/
 ?>

<?php get_header(); ?>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Latest artworks</h2>
    <?php query_latest_artworks(4); ?>
    <div class="rp-ArtworkList">
      <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('partials/artwork-inGallery'); ?>
      <?php endwhile; ?>
    </div>
    <div class="rp-ArchiveLink">
      <a href="<?php echo get_post_type_archive_link(ARTWORK_TYPE ); ?>">See all artworks</a>
    </div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Latest notes</h2>
    <?php query_latest_posts(4); ?>
    <?php while(have_posts()): the_post(); ?>
      <?php get_template_part('partials/post-link'); ?>
    <?php endwhile; ?>
    <div class="rp-ArchiveLink">
      <a href="<?php echo get_post_type_archive_link('post'); ?>">Read all notes</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
