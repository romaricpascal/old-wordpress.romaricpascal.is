<?php
/*
Template Name: Giveaway
*/
the_post();
get_header(); ?>
	<?php rp_render('page', ['post' => rp_get_the_post()], ['giveaway']);?>
</div>
<?php 
get_footer();