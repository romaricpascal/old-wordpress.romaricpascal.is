<?php
$shopURL = get_field(ARTWORK_SHOP_URL_FIELD);
$relatedProject = get_field(ARTWORK_RELATED_PROJECT_FIELD);
if (!empty($shopURL) || !empty($relatedProject)): ?>
<section class="rp-AsideSection">
  <?php if(!empty($shopURL)): ?>
    <a class="rp-ArtworkSingleLink" href="<?= $shopURL; ?>" target="_blank">Buy it in the shop.</a>
  <?php endif; ?>
  <?php if(!empty($relatedProject)): ?>
    <a class="rp-ArtworkSingleLink" href="<?= get_permalink($relatedProject[0]); ?>">Check out the whole project.</a>
  <?php endif; ?>
</section>
<?php endif; ?>

