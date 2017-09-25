<?php if (is_front_page()): ?>
<h<?= $headingLevel;?> class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-tShirts">
 <?php if($next_id): ?>
  <a href="#<?= $next_id ?>">
 <?php endif; ?>
  <span class="rp-LetteredHeading__me rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__for js-ScrollAnim__part rp-LetteredHeading__part">For
  </span>
  <span class="rp-LetteredHeading__tShirsts js-ScrollAnim__part rp-LetteredHeading__part">T-shirsts
  </span>
  <span class="rp-LetteredHeading__ js-ScrollAnim__part rp-LetteredHeading__part">&amp;
  </span>
  <span class="rp-LetteredHeading__merch js-ScrollAnim__part rp-LetteredHeading__part">merch
  </span>
   <?php if($next_id): ?>
  </a>
 <?php endif; ?>
</h<?= $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'next_id' => $next_id, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>