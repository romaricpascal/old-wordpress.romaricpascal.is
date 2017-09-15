<nav class="rp-HomeMenu">
	<a class="rp-HomeMenuItem rp-HomeMenuItem-prev rp-HomeMenu__prevNext" accesskey="j" data-key="up">Previous section</a>
	<?php foreach($items as $index => $item): 
			$marker = empty($item[0]) ? 'js-activeFragmentLink-default js-smoothScroll' : '';
			$href = !empty($item[0]) ? '#'.$item[0] : ''; ?>
	<a class="rp-HomeMenuItem rp-HomeMenuItem-fragment js-activeFragmentLink <?= $marker ?>" 
	   href="<?= $href ?>"
	   accesskey="<?= rp_get_accessKey($index); ?>">
		<?= $item[1]; ?>   	
	</a>
	<?php endforeach; ?>
	<a class="rp-HomeMenuItem rp-HomeMenuItem-next rp-HomeMenu__prevNext" accesskey="k" data-key="down">Next section</a>
</nav>