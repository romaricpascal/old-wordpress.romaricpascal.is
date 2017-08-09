<?php $with_layout = !isset($_GET['content_only']); ?>

<?php if($with_layout): ?>
<?php get_header(); ?>
<article class="rp-Content">
  <header class="">
    <h1>Projects</h1>
    <?php get_template_part('partials/archive-description', $post_type); ?>
  </header>
<?php endif; ?>

<main class="">
  <ul class="rp-ArchiveList">
  <?php while(have_posts()): the_post(); ?>
    <li class="rp-ArchiveListItem rp-ArchiveListItem-<?php echo $post_type ?>">
      <?php get_template_part('partials/post-link', $post_type); ?>
    </li>
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
