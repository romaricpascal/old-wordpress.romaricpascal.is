<?php
  $post_type = get_post_type();
  $showThumbnailLink = $post_type === PROJECT_TYPE || $post_type === ARTWORK_TYPE;
?>

<?php get_header(); ?>
<article class="rp-Archive rp-Archive-<?php echo $post_type; ?>">
   <header class="rp-ArchiveHeader rp-Archive__header">
    <h1 class="rp-ArchiveHeading rp-ArchiveHeading-<?php echo $post_type ?>"><?php the_archive_title(); ?></h1>
    <?php get_template_part('partials/archive-description', $post_type); ?>
  </header>

<div class="rp-Archive__main">
  <?php rp_render('postList', ['classes' => "rp-ArchiveList-{$post_type}", 'format' => rp_get_postListFormat($post_type)]); ?>
  <?php get_template_part('partials/prev-next-archive'); ?>
</div>
</div>

</article>

<?php get_footer();?>