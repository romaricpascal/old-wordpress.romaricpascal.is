<?php
/*
Template Name: Contact
*/
the_post();
get_header();
rp_render('page', ['post' => rp_get_the_post()], ['contact']);
get_footer();
