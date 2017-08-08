<?php $with_layout = !isset($_GET['content_only']); ?>

<?php if($with_layout): ?>
<?php get_header(); ?>
<article class="rp-ArtworkArchive">
  <header>
    <h1>Artworks</h1>
    <p>If you’re keen on seing behind the scene shots, work in progress, this is the place. I post regular pictures of what I’m working on, from sketches to finished artworks.</p>
    <p>Add the page to your RSS reader or follow me on Twitter/Instagram to make sure you don’t miss anything.</p>
  </header>
<?php endif; ?>

<main>
  <ul class="rp-ArtworkList rp-ArtworkList-grid">
  <?php while(have_posts()): the_post(); ?>
    <?php get_template_part('partials/artwork-inGallery'); ?>
  <?php endwhile; ?>
  </ul>
  <?php get_template_part('partials/prev-next-archive'); ?>
</main>

<?php if($with_layout): ?>
</article>
<?php
  get_footer();
?>
<?php endif;?>
