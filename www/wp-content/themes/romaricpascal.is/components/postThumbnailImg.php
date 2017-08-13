<?php $thumbnail = get_thumbnail_url($post, 'full'); 
	$thumbnailUrl = empty($thumbnail) ? '' : $thumbnail[0];
	$thumbnailWidth = empty($thumbnail) ? '' : $thumbnail[1];
	$thumbnailHeight = empty($thumbnail) ? '' : $thumbnail[2];
?>
<img <?php if(!empty($classes)) echo 'class="'.$classes.'"'; ?>
     src="<?php echo $thumbnailUrl;?>"
     width="<?php echo $thumbnailWidth; ?>"
     height="<?php echo $thumbnailHeight; ?>" 
	 title="<?php  echo $post->post_title;?>"
	 alt="<?php echo $post->post_title;?>" >