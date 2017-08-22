<?php if (is_front_page()): ?>
<h<?php echo $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeading-tShirts">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__for rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__tShirsts rp-LetteredHeading__part">T-shirsts
  </span>
  <span class="rp-LetteredHeading__ rp-LetteredHeading__part">&amp;
  </span>
  <span class="rp-LetteredHeading__merch rp-LetteredHeading__part">merch
  </span>
</h<?php echo $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>