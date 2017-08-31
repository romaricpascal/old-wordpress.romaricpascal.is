<?php
/*
Template Name: Contact
*/
the_post();
get_header(); ?>
<div class="rp-HomeSection u-mw-30em" data-inview>
	<?php rp_render('page', ['post' => rp_get_the_post()], ['contact']);?>
</div>
<?php 
get_footer();
