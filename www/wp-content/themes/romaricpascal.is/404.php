<?php get_header();?>
<article class="l-vertCentered u-mw-30em" data-inview>
<h1 class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-notFound"  data-scrollAnim-name="twoOneOne">
  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__page js-ScrollAnim__part rp-LetteredHeading__part">Page</span>
  <span class="rp-LetteredHeading__not js-ScrollAnim__part rp-LetteredHeading__part">not</span>
  <span class="rp-LetteredHeading__found js-ScrollAnim__part rp-LetteredHeading__part">found.</span>
  <span class="rp-LetteredHeading__ohNo js-ScrollAnim__part rp-LetteredHeading__part">Oh no!</span>
</h1>
<div>
<p>Seems the page you're after doesn't exist :(
<?php 
	$menu = wp_nav_menu(['theme_location' => MENU_NOT_FOUND, 'fallback_cb' => false, 'echo' => false]);
	if (!empty($menu)): ?>
	Maybe you were after:</p>
	<?= $menu; ?>
	<?php else: ?>
	</p>
<?php endif;?>
</div>
</article>
<?php get_footer();?>
