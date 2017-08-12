<?php 
	locate_template('partials/front-page/front-page-functions.php', true); 
	the_post();
?>
<?php get_header(); ?>
<div class="rp-Content">
<section>
<?php the_content(); ?>
</section>
<?php
	$craftList = ['lettering', 'web'];
	foreach ($craftList as $craft) {
		rp_home_project_with_craft_section($craft);
	} ?>
<section>
Testimonials
</section>
<section>
Contact
</section>
<section>
Web
</section>
<section>
Cheers
</section>
</div>
<?php get_footer(); ?>