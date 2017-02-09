<?php get_header(); ?>

<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      Artworks
    </h1>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
<div class="l-Container">
  <div class="rp-ArtworkList">
  <?php while(have_posts()): the_post(); ?>
    <a href="<?php the_permalink(); ?>" class=" rp-ArtworkListItem rp-ArtworkList__item o-ratio">
      <div class="o-ratio__content rp-ArtworkImage"><?php the_post_thumbnail();?></div>
    </a>
  <?php endwhile; ?>
  </div>
</div>
</section>
<?php get_footer(); ?>
