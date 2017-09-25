<?php
	if (empty($headingLevel)) {
		$headingLevel = 1;
	}
?>

<article class="l-sideBySide">
	<div class="l-sideBySide__header">
		<h<?= $headingLevel ?> class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-contact">
			 <?php if($next_id): ?>
			 <a href="#<?= $next_id ?>">
			 <?php endif; ?>
			<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
			<span class="rp-LetteredHeading__whyNot js-ScrollAnim__part rp-LetteredHeading__part">Why not</span>
			<span class="rp-LetteredHeading__contact js-ScrollAnim__part rp-LetteredHeading__part">contact</span>
			<span class="rp-LetteredHeading__me js-ScrollAnim__part rp-LetteredHeading__part">me</span>
			<span class="rp-LetteredHeading__qm js-ScrollAnim__part rp-LetteredHeading__part">?</span>
			 <?php if($next_id): ?>
			 </a>
			 <?php endif; ?>
  		</h<?= $headingLevel; ?>>
  		<?php rp_render('archiveDescription/archiveDescription', [],['happy-to-chat']); ?>
		<div class="u-show-xl">
			<?php rp_render('socialLinks', ['headingLevel' => $headingLevel + 1]); ?>
		</div>
	</div>
	<section class="l-sideBySide__main">
		<h<?= $headingLevel+1; ?>>Send me a message…</h<?= $headingLevel+1; ?>>
		<?= rp_get_content($post); ?>
	</section>
	<div class="u-hide-xl">
		<?php rp_render('socialLinks', ['headingLevel' => $headingLevel + 1]); ?>
	</div>
<article>