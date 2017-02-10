<?php get_header(); ?>
<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      Notes
    </h1>
  </div>
</section>
<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">

    <?php while(have_posts()): the_post(); ?>
    <a href="<?php the_permalink(); ?>">
      <time><?php the_date(); ?></time>
      <h2><?php the_title();?></h2>
    </a>
    <?php endwhile; ?>
  </div>
</section>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Stay updated</h2>
    RSS, Newsletters, Social networks (Twitter & IG)
  </div>
</section>

<?php get_footer();?>
