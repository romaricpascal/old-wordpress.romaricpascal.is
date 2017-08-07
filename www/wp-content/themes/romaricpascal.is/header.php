<?php $title = wp_title(' ', false);
 if ($title) { $title.= '|'; }
 $title.= get_bloginfo('name'); ?>

<!doctype html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>|<?php bloginfo('description');?>" href="<?php bloginfo('url');?>/feed">

    <title><?php echo $title; ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri('assets/images/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/android-chrome-192x192.png') ?>" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/favicon-16x16.png') ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo get_theme_file_uri('assets/images/favicons/manifest.json') ?>">
    <link rel="mask-icon" href="<?php echo get_theme_file_uri('assets/images/favicons/safari-pinned-tab.svg') ?>" color="#260b23">
    <meta name="msapplication-TileColor" content="#260b23">
    <meta name="msapplication-TileImage" content="<?php echo get_theme_file_uri('assets/images/favicons/mstile-144x144.png') ?>">
    <meta name="theme-color" content="#260b23">

    <!-- FB OpenGraph info -->
    <meta prefix="og:http://ogp.me/ns#" name="og:description" content="<?php  bloginfo('description')?>">
    <meta prefix="og:http://ogp.me/ns#" name="og:image" content="<?php the_social_card_image(); ?>">

    <!-- Twitter cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@romaricpascal" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php  bloginfo('description')?>" />
    <meta name="twitter:image" content="<?php the_social_card_image(); ?>" />

    <?php wp_head();?>
  </head>
  <body>
    <header id="#header" class="rp-Header">
      <nav class="rp-MainNav">
        <a class="t-hidden-visually" tabindex="1" href="#content">Skip to content</a>
        <a class="rp-Header__menu rp-MenuToggle" href="#main-nav">Menu</a>
        <div class="rp-MenuContainer" id="main-nav">
        <?php wp_nav_menu(['theme_location' => MENU_MAIN_1,'menu_class' => 'rp-Menu rp-Header__menuI']); ?>
        <a class="rp-MenuToggle" href="#header">Close menu</a>
        <small class="rp-Legal l-Container">© Romaric Pascal (trading name of <a href="https://beta.companieshouse.gov.uk/company/08544032">Rhumaric Ltd</a>)</small>
        </div>
      </nav>
    </header>
    <main class="rp-Main">

