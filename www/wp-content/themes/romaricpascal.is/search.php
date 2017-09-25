<?php get_header();?>
<div class="rp-HomeSection" data-inview>
	<article class="l-sideBySide">
		<header class="l-sideBySide__header">
			<h1 class="rp-LetteredHeading js-ScrollAnim rp-LetteredHeading-looking" data-scrollAnim-name="twoOneOne">
				  <span class="rp-LetteredHeading__picture rp-LetteredHeading__part"></span>
				  <span class="rp-LetteredHeading__you js-ScrollAnim__part rp-LetteredHeading__part">You</span>
				  <span class="rp-LetteredHeading__were js-ScrollAnim__part rp-LetteredHeading__part">were</span>
				  <span class="rp-LetteredHeading__looking js-ScrollAnim__part rp-LetteredHeading__part">looking</span>
				  <span class="rp-LetteredHeading__for js-ScrollAnim__part rp-LetteredHeading__part">for...</span>
  			</h1>
			<?php get_search_form(true); ?>
		</header>
		<div class="l-sideBySide__main">
			<?php rp_render('postList', ['classes' => "rp-SearchList", 'headingLevel' => 2]); ?>
		</div>
	</article>
</div>
<?php get_footer();?>