<?php if (is_home()): ?>
<h<?php echo $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeading-prints">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__for rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__prints rp-LetteredHeading__part">Prints
  </span>
  <span class="rp-LetteredHeading__ rp-LetteredHeading__part">&amp;
  </span>
  <span class="rp-LetteredHeading__illustration rp-LetteredHeading__part">Illustration
  </span>
</h<?php echo $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>