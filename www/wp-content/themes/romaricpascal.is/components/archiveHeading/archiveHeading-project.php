<h<?php echo $headingLevel;?> >
	<div class="rp-LetteredHeading rp-LetteredHeading-works">
		<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
		<span class="rp-LetteredHeading__some rp-LetteredHeading__part">Some</span>
		<span class="rp-LetteredHeading__works rp-LetteredHeading__part">works</span>
		<span class="rp-LetteredHeading__of rp-LetteredHeading__part">of</span>
	</div>
	<p class="rp-ProjectCraft">
		<?php if (empty($craft)) {
			echo 'all kinds.';
		} else {
			echo $craft->name;
		}?>
	</p>
</h<?php echo $headingLevel;?>>
