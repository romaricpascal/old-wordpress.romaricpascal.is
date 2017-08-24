<?php get_header();?>
<section class="rp-HomeSection">
<h1 class="rp-LetteredHeading rp-LetteredHeadingEntrance rp-LetteredHeading-notFound">
  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
  <span class="rp-LetteredHeading__page a-timing-2-1-1__I rp-LetteredHeading__part">Page</span>
  <span class="rp-LetteredHeading__not a-timing-2-1-1__III rp-LetteredHeading__part">not</span>
  <span class="rp-LetteredHeading__found a-timing-2-1-1__II rp-LetteredHeading__part">found.</span>
  <span class="rp-LetteredHeading__ohNo a-timing-2-1-1__IV rp-LetteredHeading__part">Oh no!</span>
</h1>
<div>
<p>Seems the page you're after doesn't exist :(
<?php 
	$menu = wp_nav_menu(['theme_location' => MENU_NOT_FOUND, 'fallback_cb' => false, 'echo' => false]);
	if (!empty($menu)): ?>
	Maybe you were after:</p>
	<?php echo $menu; ?>
	<?php else: ?>
	</p>
<?php endif;?>
</div>
</section>
<?php get_footer();?>
