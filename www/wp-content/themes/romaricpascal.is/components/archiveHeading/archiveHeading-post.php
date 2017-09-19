<h<?= $headingLevel;?> class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-read">
 <?php if($next_id): ?>
 	<a href="#<?= $next_id ?>">
 <?php endif; ?>
  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__or a-timing-2-1-1__II rp-LetteredHeading__part">Or</span>
  <span class="rp-LetteredHeading__haveA a-timing-2-1-1__III rp-LetteredHeading__part">have a</span>
  <span class="rp-LetteredHeading__read a-timing-2-1-1__I rp-LetteredHeading__part">read</span>
  <span class="rp-LetteredHeading__about a-timing-2-1-1__IV rp-LetteredHeading__part">about</span>
      <?php if($next_id): ?>
 	</a>
 <?php endif; ?>
</h<?= $headingLevel;?>>