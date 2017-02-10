<?php $with_layout = !isset($_GET['content_only']); ?>

<?php if($with_layout): ?>
<?php get_header(); ?>

<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      Artworks
    </h1>
  </div>
</section>
<?php endif; ?>

<section class="rp-LandingSection t-light-on-dark">
<div class="l-Container" data-loadMore>
  <div class="rp-LoadMoreLink" data-loadMore-type="previous">
    <?php previous_posts_link('More recent works'); ?>
    <div class="sk-chasing-dots">
        <div class="sk-child sk-dot1"></div>
        <div class="sk-child sk-dot2"></div>
      </div>
  </div>
  <div data-loadMore-content class="rp-ArtworkList">
  <?php while(have_posts()): the_post(); ?>
    <a href="<?php the_permalink(); ?>" class=" rp-ArtworkListItem rp-ArtworkList__item o-ratio">
      <div class="o-ratio__content rp-ArtworkImage"><?php the_post_thumbnail();?></div>
    </a>
  <?php endwhile; ?>
  </div>
  <div class="rp-LoadMoreLink" data-loadMore-type="next">
    <?php next_posts_link('Older artworks'); ?>
    <div class="sk-chasing-dots">
        <div class="sk-child sk-dot1"></div>
        <div class="sk-child sk-dot2"></div>
      </div>
  </div>
</div>
</section>

<?php if($with_layout): ?>
<?php get_footer(); ?>
<?php endif;?>
