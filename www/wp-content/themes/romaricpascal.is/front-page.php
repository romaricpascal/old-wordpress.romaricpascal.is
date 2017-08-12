<?php 
	locate_template('partials/front-page/front-page-functions.php', true); 
	the_post();
?>
<?php get_header(); ?>
<section>
<?php the_content(); ?>
</section>
<?php
	$craftList = ['lettering', 'web'];
	foreach ($craftList as $craft) {
		rp_home_project_with_craft_section($craft);
	} ?>
<section>
</section>
<section>
T-shirt & merch
</section>
<section>
Prints & Illustrations
</section>
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
<?php get_footer(); ?>