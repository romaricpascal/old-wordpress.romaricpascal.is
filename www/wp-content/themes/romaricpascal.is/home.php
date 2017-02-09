<?php get_header(); ?>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Artworks</h2>
    <?php while(have_posts()): the_post(); ?>
      <div>
        <?php the_title(); ?>
      </div>
    <?php endwhile; ?>
    <a href="artworks-of">See all artworks</a>
  </div>
</section>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Thoughts</h2>
    <?php while(have_posts()): the_post(); ?>
    <?php endwhile; ?>
    <a href="thoughts-about">Read all thoughts</a>
  </div>
</section>

<?php get_footer(); ?>
