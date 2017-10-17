<?php if (is_front_page()): ?>
<h<?= $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeading-logos js-ScrollAnim">
 <?php if($next_id): ?>
  <a href="#<?= $next_id ?>">
 <?php endif; ?>
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part" role="presentation"></span>
  <span class="rp-LetteredHeading__for js-ScrollAnim__part rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__logos js-ScrollAnim__part rp-LetteredHeading__part">Logos
  </span>
  <span class="rp-LetteredHeading__and js-ScrollAnim__part rp-LetteredHeading__part">and
  </span>
  <span class="rp-LetteredHeading__brands js-ScrollAnim__part rp-LetteredHeading__part">Brands
  </span>
  <?php if($next_id): ?>
    </a>
  <?php endif; ?>
</h<?= $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'next_id' => $next_id, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>
