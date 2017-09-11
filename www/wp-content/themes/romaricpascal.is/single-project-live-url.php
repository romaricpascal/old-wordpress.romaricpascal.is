<?php
  $url = get_field('live_url');
?>

<?php if ($url): ?>
	<div class="rp-AsideSection">
		<h2 class="rp-AsideHeading">Live at</h2>
		<a class="rp-LiveUrl" href="<?= $url; ?>" target="_blank"><?= $url; ?></a>
	</div>
<?php endif; ?>