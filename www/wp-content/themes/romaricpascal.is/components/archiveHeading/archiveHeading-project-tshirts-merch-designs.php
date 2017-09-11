<?php if (is_front_page()): ?>
<h<?= $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-tShirts">
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__for rp-LetteredHeadingEntrance__II rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__tShirsts rp-LetteredHeadingEntrance__I rp-LetteredHeading__part">T-shirsts
  </span>
  <span class="rp-LetteredHeading__ rp-LetteredHeadingEntrance__III rp-LetteredHeading__part">&amp;
  </span>
  <span class="rp-LetteredHeading__merch rp-LetteredHeadingEntrance__IV rp-LetteredHeading__part">merch
  </span>
</h<?= $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>