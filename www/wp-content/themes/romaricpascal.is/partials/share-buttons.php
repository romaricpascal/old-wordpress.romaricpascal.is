<ul class="rp-ShareLinkList">
	<?php foreach($links as $site => $link): ?>
		<li><a class="rp-ShareLink rp-ShareLink-<?php echo strtolower($site); ?>" href="<?php echo $link; ?>" target="_blank">Share on <?php echo $site; ?></a></li>
	<?php endforeach; ?>
</ul>