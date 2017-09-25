<?php if (is_front_page()): ?>
	<h<?= $headingLevel;?> class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-websites"  data-scrollAnim-name="twoOneOne">
	 <?php if($next_id): ?>
  <a href="#<?= $next_id ?>">
 <?php endif; ?>
  		<span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  		<span class="rp-LetteredHeading__iAlso js-ScrollAnim__part rp-LetteredHeading__part">I also</span>
  		<span class="rp-LetteredHeading__make js-ScrollAnim__part rp-LetteredHeading__part">make</span>
  		<span class="rp-LetteredHeading__website js-ScrollAnim__part rp-LetteredHeading__part">websites.</span>  
  		 <?php if($next_id): ?>
  </a>
 <?php endif; ?>
	</h<?= $headingLevel;?>>
<?php else :
	rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'next_id' => $next_id, 'craft' => $craft, 'headingLevel' => 1], ['project']);
endif; ?>