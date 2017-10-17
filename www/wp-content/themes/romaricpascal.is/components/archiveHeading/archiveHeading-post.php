<h<?= $headingLevel;?> class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-read"  data-scrollAnim-name="twoOneOne">
 <?php if($next_id): ?>
 	<a href="#<?= $next_id ?>">
 <?php endif; ?>
  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__or js-ScrollAnim__part rp-LetteredHeading__part">Or</span>
  <span class="rp-LetteredHeading__haveA js-ScrollAnim__part rp-LetteredHeading__part">have a</span>
  <span class="rp-LetteredHeading__read js-ScrollAnim__part rp-LetteredHeading__part">read</span>
  <span class="rp-LetteredHeading__about js-ScrollAnim__part rp-LetteredHeading__part">about</span>
      <?php if($next_id): ?>
 	</a>
 <?php endif; ?>
</h<?= $headingLevel;?>>