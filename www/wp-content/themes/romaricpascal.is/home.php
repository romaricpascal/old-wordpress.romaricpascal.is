<?php
  $post_type = get_post_type();
?>

<?php get_header(); ?>
<article class="rp-Archive rp-Archive-<?php echo $post_type; ?>">
   <header class="rp-ArchiveHeader rp-Archive__header">
    <h1 class="rp-ArchiveHeading rp-ArchiveHeading-<?php echo $post_type ?>">Blog</h1>
    <?php rp_render('archiveDescription/archiveDescription', ['postType' => $postType, 'craft' => $craft], [$postTypeName, rp_get($craft, 'slug')]); ?>
  </header>

<div class="rp-Archive__main">
  <ul class="rp-ArchiveList">
  <?php while(have_posts()): the_post(); ?>
    <li class="rp-ArchiveListItem rp-ArchiveListItem-<?php echo $post_type ?>">
      <?php get_template_part('partials/post-link', $post_type); ?>
    </li>
  <?php endwhile; ?>
  </ul>
  <?php get_template_part('partials/prev-next-archive'); ?>
</div>
</div>

</article>

<?php get_footer();?>
