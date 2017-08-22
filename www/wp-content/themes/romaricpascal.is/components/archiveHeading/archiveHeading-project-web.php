<?php if (is_home()): ?>
	<h<?php echo $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeading-websites">
  		<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  		<span class="rp-LetteredHeading__iAlso rp-LetteredHeading__part">I also</span>
  		<span class="rp-LetteredHeading__make rp-LetteredHeading__part">make</span>
  		<span class="rp-LetteredHeading__website rp-LetteredHeading__part">websites.</span>  
	</h<?php echo $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>