<?php
  if (empty($headingLevel)) {
    $headingLevel = 1;
  }
?>
<a class="rp-PostLink rp-Note<?= $classes; ?>" 
   <?php if ($accesskey !== null) { echo "accesskey='{$accesskey}'";} ?>
   href="<?= rp_get_permalink($post); ?>">
  <h<?= $headingLevel;?> class="rp-NoteTitle"><?= $post->post_title?></h<?= $headingLevel; ?>>
  <time class="rp-Note__time rp-NoteTime">
  	<span class="rp-NoteDay rp-NoteTime__part"><?= get_the_date('d'); ?></span>
  	<span class="rp-NoteMonth rp-NoteTime__part"><?= get_the_date('M'); ?></span>
  	<?php 
  	  $post_year = get_the_date('Y');
  	  $current_year = date('Y');
  	  if ($post_year != $current_year): ?>
  		<span class="rp-NoteYear rp-NoteTime__part"><?= get_the_date('Y'); ?></span>
  	<?php endif; ?>
  </time>
  <?php if($accesskey !== null): ?>
    <kbd class="rp-AccessKeyHint"><?= $accesskey; ?></kbd>
  <?php endif;?>
</a>