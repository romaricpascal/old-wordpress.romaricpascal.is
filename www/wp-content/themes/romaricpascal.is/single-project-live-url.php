<?php
  $url = get_field('live_url');
?>

<?php if ($url): ?>
	<div class="rp-AsideSection">
		<h2 class="rp-AsideHeading">Live at</h2>
		<a class="rp-LiveUrl" href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>
	</div>
<?php endif; ?>