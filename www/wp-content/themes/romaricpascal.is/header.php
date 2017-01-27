<!doctype html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?= bloginfo('ress_url') ?>">

    <title>
      <?php wp_title(' '); ?>
      <?php if(wp_title(' ', false)) { echo '|'; } ?>
      <?php bloginfo('name'); ?>
    </title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri('assets/images/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/android-chrome-192x192.png') ?>" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('assets/images/favicons/favicon-16x16.png') ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo get_theme_file_uri('assets/images/favicons/manifest.json') ?>">
    <link rel="mask-icon" href="<?php echo get_theme_file_uri('assets/images/favicons/safari-pinned-tab.svg') ?>" color="#260b23">
    <meta name="msapplication-TileColor" content="#260b23">
    <meta name="msapplication-TileImage" content="<?php echo get_theme_file_uri('assets/images/favicons/mstile-144x144.png') ?>">
    <meta name="theme-color" content="#260b23">

    <?php wp_head();?>
  </head>
  <body>
    <header id="#header" class="rp-Header">
      <div class="rp-Logo rp-Header__logo">
        <img src="<?php echo get_theme_file_uri('assets/images/r-p-monogram.svg') ?>" alt="R P monogram" />
      </div>
      <nav>
        <a class="t-hidden-visually" tabindex="1" href="#content">Skip to content</a>
        <a class="rp-MenuControl" href="#main-nav">Menu</a>
        <div class="rp-MainNav" id="main-nav">
        <?php wp_nav_menu(['theme_location' => MENU_PRIMARY,'menu_class' => 'rp-Menu rp-Header__menu']); ?>

        <div class="rp-ContactPrompt rp-Header__contact">Looking to work with me? <a href="hello@romaricpascal.is">Contact me</a></div>
        <a class="rp-MenuControl" href="#header">Close menu</a>
        </div>
      </nav>
    </header>
    <main>
