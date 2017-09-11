<?php 
	if (!$size) {
		$size = 'full';
	}
	$thumbnail = get_thumbnail_url($post, $size); 
	$thumbnailUrl = empty($thumbnail) ? '' : $thumbnail[0];
	$thumbnailWidth = empty($thumbnail) ? '' : $thumbnail[1];
	$thumbnailHeight = empty($thumbnail) ? '' : $thumbnail[2];

	if ($srcset && is_array($srcset)) {
		$srcset = rp_get_the_thumbnail_srcset($post, $srcset);
	}
?>
<div class="u-loadable <?= $classes; ?>">
	<img class="u-loadable__content"
	     src="<?= $thumbnailUrl;?>"
		 title="<?= htmlspecialchars($post->post_title);?>"
		 alt="<?= htmlspecialchars($post->post_title);?>"
		 <?php if ($srcset): ?>
		 	srcset="<?= $srcset ?>"
		 <?php endif; ?> 
		<?php if ($sizes): ?>
			sizes="<?= $sizes ?>"
		<?php endif;?>
		 >
</div>