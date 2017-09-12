<?php
/*
Template Name: Contact
*/
the_post();
get_header(); ?>
<div class="u-mw-30em-xl-down" data-inview>
	<?php rp_render('page', ['post' => rp_get_the_post()], ['happy-to-chat']);?>
</div>
<?php 
get_footer();
