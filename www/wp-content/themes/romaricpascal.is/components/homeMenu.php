<nav class="rp-HomeMenu">
	<?php foreach($items as $item): ?>
	<a class="rp-HomeMenuItem" href="#<?php echo $item[0]; ?>"><?php echo $item[1]; ?></a>
	<?php endforeach; ?>
</nav>