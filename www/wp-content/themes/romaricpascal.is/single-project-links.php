<?php
  $shopURL = get_field('shop_url');
  $sourcesURL = get_field('sources_url'); ?>
<?php if (!empty($shopURL) || !empty($sourcesURL)): ?>
<div class="rp-AsideSection">
	<?php if(!empty($shopURL)): ?>
		<a href="<?= $shopURL; ?>" target="_blank">Buy in the shop.</a>
	<?php endif; ?>
	<?php if(!empty($sourcesURL)): ?>
		<a href="<?= $sourcesURL; ?>" target="_blank">Check out the source code.</a>
	<?php endif; ?>
</div>
<?php endif; ?>