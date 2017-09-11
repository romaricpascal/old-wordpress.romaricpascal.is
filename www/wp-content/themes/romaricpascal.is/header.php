<?php $title = rp_title(); ?>

<!doctype html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>|<?php bloginfo('description');?>" href="<?php bloginfo('url');?>/feed">

    <title><?= $title; ?></title>

    <?php rp_render('favicons'); ?>

    <!-- FB OpenGraph info -->
    <meta prefix="og:http://ogp.me/ns#" name="og:description" content="<?php  bloginfo('description')?>">
    <meta prefix="og:http://ogp.me/ns#" name="og:image" content="<?php the_social_card_image(); ?>">

    <!-- Twitter cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@romaricpascal" />
    <meta name="twitter:title" content="<?= $title; ?>" />
    <meta name="twitter:description" content="<?php  bloginfo('description')?>" />
    <meta name="twitter:image" content="<?php the_social_card_image(); ?>" />

    <?php wp_head();?>
  </head>
  <body <?php body_class('flexbug3Wrapper'); ?>>
    <header id="#header" class="rp-Header">
        <?php if (is_single()) {
            rp_render('breadcrumbNav', ['breadcrumbs' => rp_get_breadcrumbs()]);
        } ?>
      <nav class="rp-MainNav">
        <a class="t-hidden-visually" tabindex="1" href="#content">Skip to content</a>
        <a href="#main-nav" class="js-toggle" data-toggle-group="overlays" data-toggle-target=".rp-MenuContainer">Menu</a>
        <div class="rp-MenuContainer js-outsideToggle" id="main-nav">
        <a class="rp-NavLogo" href="<?php bloginfo('url');?>" title="Home">
            <img src="<?= get_theme_file_uri('assets/images/rp-knockout_shade_144.png')?>" alt="Home">
        </a>
        <?php wp_nav_menu(['theme_location' => MENU_MAIN_1,'menu_class' => 'rp-Menu rp-Header__menuI']); ?>
        <a class="rp-MenuToggle js-toggle" href="#" data-toggle-group="overlays" data-toggle-target=".rp-MenuContainer">Close menu</a>
        <small class="rp-Legal l-Container">© Romaric Pascal (trading name of <a href="https://beta.companieshouse.gov.uk/company/08544032">Rhumaric Ltd</a>)</small>
        </div>
      </nav>
    </header>
    <div class="rp-Viewport l-vertCentered u-mh-100vh">

