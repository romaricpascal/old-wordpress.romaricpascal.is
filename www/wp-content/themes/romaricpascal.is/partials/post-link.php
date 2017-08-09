
<a class="rp-Note" href="<?php the_permalink(); ?>">
  <h2 class="rp-NoteTitle"><?php the_title();?></h2>
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
