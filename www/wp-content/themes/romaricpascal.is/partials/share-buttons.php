<ul class="rp-ShareLinkList">
	<?php foreach($links as $site => $link): ?>
		<li><a class="rp-ShareLink rp-ShareLink-<?= strtolower($site); ?>" href="<?= $link; ?>" target="_blank">Share on <?= $site; ?></a></li>
	<?php endforeach; ?>
</ul>