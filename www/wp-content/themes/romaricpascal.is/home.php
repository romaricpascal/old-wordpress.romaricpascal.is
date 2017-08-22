<?php
  $post_type = get_post_type();
?>

<?php get_header(); ?>
<article class="rp-Archive rp-Archive-<?php echo $post_type; ?>">
   <header class="rp-ArchiveHeader rp-Archive__header">
    <?php rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['post', rp_get($craft, 'slug')]); ?>
    <?php rp_render('archiveDescription/archiveDescription', ['postType' => $postType, 'craft' => $craft], ['post', rp_get($craft, 'slug')]); ?>
  </header>

<div class="rp-Archive__main">
  <?php rp_render('postList', ['classes' => "rp-ArchiveList-{$postType}", 'format' => rp_get_postListFormat($postType), 'headingLevel' => 2]); ?>
  <?php get_template_part('partials/prev-next-archive'); ?>
</div>
</div>

</article>

<?php get_footer();?>
