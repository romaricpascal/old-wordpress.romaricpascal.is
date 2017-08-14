<?php
	$links = get_bookmarks(['category_name' => 'social', 'order_by' => 'link_rating', 'order' => 'DESC']);
?>
<h2>Follow me</h2>
<ul class="rp-List-reset rp-ShareLinkList">
	<?php foreach($links as $link):?>
		<li>
			<a class="rp-ShareLink rp-ShareLink-<?php echo strtolower($link->link_name); ?>" 
			   href="<?php echo $link->link_url; ?>"
			   rel="me"
			   target="_blank">
				<?php echo $link->link_name; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>