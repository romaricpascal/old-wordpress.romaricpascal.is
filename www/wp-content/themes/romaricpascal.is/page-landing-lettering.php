<?php
/*
Template Name: Landing page (Lettering)
*/

global $post;
the_post();

$craft = get_craft($post);

get_header(); ?>
<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero rp-Underlined-landing">
      <?php echo get_post_meta($post->ID, 'page-greeting', true); ?>
    </h1>
    <div class="rp-HeroHeading">
      <?php echo get_post_meta($post->ID, 'page-message', true); ?>
    </div>
  </div>
</section>
<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <?php query_featured_artworks(4); ?>
    <div class="rp-ArtworkList">
      <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('partials/artwork-inGallery'); ?>
      <?php endwhile; ?>
    </div>
    <div class="rp-ArchiveLink rp-ArchiveLink-withDetail">
      <a href="<?php echo get_post_type_archive_link(ARTWORK_TYPE ); ?>">See more artworks <span class="rp-ArchiveLink__detail">(including sketches, work in progress...)</span></a>
    </div>
  </div>
</section>
<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Past projects</h2>
    <div class="rp-FeaturedProjects"><?php the_featured_projects($craft) ?></div>
    <div><?php a_testimonial($craft) ?></div>
  </div>
</section>

<section class="rp-LandingSection rp-LandingSection-withSpaceAfter t-light-on-dark">
  <div class="l-Container">
    <div class="rp-USPList">
      <?php the_usps($craft) ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
