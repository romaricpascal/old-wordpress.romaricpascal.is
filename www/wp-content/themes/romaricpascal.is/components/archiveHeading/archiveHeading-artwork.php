<h<?= $headingLevel;?> class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-look"  data-scrollAnim-name="twoOneOne">
 <?php if($next_id): ?>
 	<a href="#<?= $next_id ?>">
 <?php endif; ?>
  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__have js-ScrollAnim__part rp-LetteredHeading__part">Have</span>
  <span class="rp-LetteredHeading__a js-ScrollAnim__part rp-LetteredHeading__part">a</span>
  <span class="rp-LetteredHeading__look js-ScrollAnim__part rp-LetteredHeading__part">look</span>
  <span class="rp-LetteredHeading__etc js-ScrollAnim__part rp-LetteredHeading__part">…</span>
    <?php if($next_id): ?>
 	</a>
 <?php endif; ?>
</h<?= $headingLevel;?>>