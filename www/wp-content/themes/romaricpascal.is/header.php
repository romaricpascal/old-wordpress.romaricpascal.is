<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php template_file_uri('style.css'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?= home_url('/feed'); ?>">

  <title>
    <?php wp_title(' '); ?>
    <?php if(wp_title(' ', false)) { echo '|'; } ?>
    <?php bloginfo('name'); ?>
  </title>
</head>
<body>
  <header>
    <div>Logo</div>
    <?php rp_the_menu(MENU_PRIMARY) ?>
    <div>Looking to work with me? <a href="hello@romaricpascal.is">Contact me</a></div>
  </header>
  <main>
