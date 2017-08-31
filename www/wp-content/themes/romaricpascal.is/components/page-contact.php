<?php
	if (empty($headingLevel)) {
		$headingLevel = 1;
	}
?>

<article class="l-sideBySide">
	<div class="l-sideBySide__header">
		<h<?php echo $headingLevel ?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-contact">
			<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
			<span class="rp-LetteredHeading__whyNot rp-LetteredHeadingEntrance__II rp-LetteredHeading__part">Why not</span>
			<span class="rp-LetteredHeading__contact rp-LetteredHeadingEntrance__I rp-LetteredHeading__part">contact</span>
			<span class="rp-LetteredHeading__me rp-LetteredHeadingEntrance__III rp-LetteredHeading__part">me</span>
			<span class="rp-LetteredHeading__qm rp-LetteredHeadingEntrance__IV rp-LetteredHeading__part">?</span>
  		</h<?php echo $headingLevel; ?>>
  		<?php rp_render('archiveDescription/archiveDescription', [],['contact']); ?>
		<div class="u-show-xl">
			<?php rp_render('socialLinks', ['headingLevel' => $headingLevel + 1]); ?>
		</div>
	</div>
	<section class="l-sideBySide__main">
		<h<?php echo $headingLevel+1; ?>>Send me a message…</h<?php echo $headingLevel+1; ?>>
		<?php echo rp_get_content($post); ?>
	</section>
	<div class="u-hide-xl">
		<?php rp_render('socialLinks', ['headingLevel' => $headingLevel + 1]); ?>
	</div>
<article>