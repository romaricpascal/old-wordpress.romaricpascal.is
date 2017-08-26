<?php
  if (empty($headingLevel)) {
    $headingLevel = 1;
  }
?>
<a class="rp-Note u-mb-2 <?php echo $classes; ?>" 
   <?php if ($accesskey !== null) { echo "accesskey='{$accesskey}'";} ?>
   href="<?php echo rp_get_permalink($post); ?>">
  <h<?php echo $headingLevel;?> class="rp-NoteTitle"><?php echo $post->post_title?></h<?php echo $headingLevel; ?>>
  <time class="rp-Note__time rp-NoteTime">
  	<span class="rp-NoteDay rp-NoteTime__part"><?php echo get_the_date('d'); ?></span>
  	<span class="rp-NoteMonth rp-NoteTime__part"><?php echo get_the_date('M'); ?></span>
  	<?php 
  	  $post_year = get_the_date('Y');
  	  $current_year = date('Y');
  	  if ($post_year != $current_year): ?>
  		<span class="rp-NoteYear rp-NoteTime__part"><?php echo get_the_date('Y'); ?></span>
  	<?php endif; ?>
  </time>
</a>