<?php
/*
Template Name: Contact
*/
the_post();
get_header(); ?>
<div class="rp-HomeSection">
	<?php rp_render('page', ['post' => rp_get_the_post()], ['contact']);?>
</div>
<?php 
get_footer();
