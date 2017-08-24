<?php if (is_front_page()): ?>
<h<?php echo $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-logos">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part" role="presentation"></span>
  <span class="rp-LetteredHeading__for rp-LetteredHeadingEntrance__II rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__logos rp-LetteredHeadingEntrance__I rp-LetteredHeading__part">Logos
  </span>
  <span class="rp-LetteredHeading__and rp-LetteredHeadingEntrance__III rp-LetteredHeading__part">and
  </span>
  <span class="rp-LetteredHeading__brands rp-LetteredHeadingEntrance__IV rp-LetteredHeading__part">Brands
  </span>  
</h<?php echo $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>
