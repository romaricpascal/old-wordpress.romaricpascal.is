<?php if (is_front_page()): ?>
	<h<?= $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-websites">
  		<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  		<span class="rp-LetteredHeading__iAlso a-timing-2-1-1__II rp-LetteredHeading__part">I also</span>
  		<span class="rp-LetteredHeading__make a-timing-2-1-1__III rp-LetteredHeading__part">make</span>
  		<span class="rp-LetteredHeading__website a-timing-2-1-1__I rp-LetteredHeading__part">websites.</span>  
	</h<?= $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>