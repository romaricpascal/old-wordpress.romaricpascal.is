<?php if (is_front_page()): ?>
<h<?php echo $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-prints">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__for rp-LetteredHeadingEntrance__II rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__prints rp-LetteredHeadingEntrance__I rp-LetteredHeading__part">Prints
  </span>
  <span class="rp-LetteredHeading__ rp-LetteredHeadingEntrance__III rp-LetteredHeading__part">&amp;
  </span>
  <span class="rp-LetteredHeading__illustration rp-LetteredHeadingEntrance__IV rp-LetteredHeading__part">Illustration
  </span>
</h<?php echo $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>