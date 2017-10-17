<h<?= $headingLevel;?> class="js-ScrollAnim" >
	<div class="rp-LetteredHeading rp-LetteredHeading-works">
		<?php if($next_id): ?>
  		<a href="#<?= $next_id ?>">
 		<?php endif; ?>
		<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
		<span class="rp-LetteredHeading__some js-ScrollAnim__part rp-LetteredHeading__part">Some</span>
		<span class="rp-LetteredHeading__works js-ScrollAnim__part rp-LetteredHeading__part">works</span>
		<span class="rp-LetteredHeading__of js-ScrollAnim__part rp-LetteredHeading__part">of</span>
		<?php if($next_id): ?>
  		</a>
 		<?php endif; ?>
	</div>
	<p class="rp-ProjectCraft js-ScrollAnim__part">
		<?php if (empty($craft)) {
			echo 'all kinds.';
		} else {
			echo $craft->name;
		}?>
	</p>
</h<?= $headingLevel;?>>
