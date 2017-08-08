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

<main data-loadMore>
  <nav class="rp-LoadMoreLink" data-loadMore-type="previous">
    <?php previous_posts_link('More recent works'); ?>
    <div class="sk-chasing-dots">
        <div class="sk-child sk-dot1"></div>
        <div class="sk-child sk-dot2"></div>
      </div>
  </nav>
  <ul data-loadMore-content class="rp-ArtworkList rp-ArtworkList-grid">
  <?php while(have_posts()): the_post(); ?>
    <?php get_template_part('partials/artwork-inGallery'); ?>
  <?php endwhile; ?>
  </ul>
  <nav class="rp-LoadMoreLink" data-loadMore-type="next">
    <?php next_posts_link('Older artworks'); ?>
    <div class="sk-chasing-dots">
      <div class="sk-child sk-dot1"></div>
      <div class="sk-child sk-dot2"></div>
    </div>
  </nav>
</main>

<?php if($with_layout): ?>
</article>
<?php
  get_footer();
?>
<?php endif;?>
