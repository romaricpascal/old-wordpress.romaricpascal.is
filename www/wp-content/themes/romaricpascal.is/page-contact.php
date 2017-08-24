<?php
/*
Template Name: Contact
*/
the_post();
get_header(); ?>
<div class="rp-HomeSection" data-inview>
	<?php rp_render('page', ['post' => rp_get_the_post()], ['contact']);?>
</div>
<?php 
get_footer();
