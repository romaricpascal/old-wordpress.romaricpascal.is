<?php if(!empty($href)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-<?=$rel?> <?=$classes?>" 
	   href="<?= $href ?>"
	   rel="<?= $rel ?>"
	   <?php if ($rel === 'prev'):?>
	   accesskey="j"
	   data-key="left"
		<?php elseif($rel === 'next'): ?>
		accesskey="k"
	   	data-key="right"
		<?php endif; ?>
	   title="<?= htmlspecialchars($title) ?>">
	   	<?= title ?>
	</a>
<?php else: ?>
	<span class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-<?=$rel?> <?=$classes?>"><?= $empty ?></span>
<?php endif; ?>