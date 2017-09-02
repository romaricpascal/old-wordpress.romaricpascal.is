<?php $thumbnail = get_thumbnail_url($post, 'full'); 
	$thumbnailUrl = empty($thumbnail) ? '' : $thumbnail[0];
	$thumbnailWidth = empty($thumbnail) ? '' : $thumbnail[1];
	$thumbnailHeight = empty($thumbnail) ? '' : $thumbnail[2];
?>
<div class="u-loadable <?php echo $classes; ?>">
	<img class="u-loadable__content"
	     src="<?php echo $thumbnailUrl;?>"
	     width="<?php echo $thumbnailWidth; ?>"
	     height="<?php echo $thumbnailHeight; ?>" 
		 title='<?php  echo htmlspecialchars($post->post_title);?>'
		 alt="<?php echo htmlspecialchars($post->post_title);?>" >
</div>