<?php
	$links = get_bookmarks(['category_name' => 'social', 'order_by' => 'link_rating', 'order' => 'DESC']);
	if (empty($headingLevel)) {
		$headingLevel = 1;
	}
?>
<h<?= $headingLevel; ?>>… or follow me</h<?= $headingLevel;?>>
<ul class="u-list-flat rp-ShareLinkList">
	<?php foreach($links as $link):?>
		<li>
			<a class="rp-ShareLink rp-ShareLink-<?= strtolower($link->link_name); ?>" 
			   href="<?= $link->link_url; ?>"
			   rel="me"
			   target="_blank">
				<?= $link->link_name; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>