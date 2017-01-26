<?php

// 1. Load necessary taxonomies & content types
require_once('taxonomies/craft-taxonomy.php');
require_once('content-types/usps.php');
require_once('content-types/testimonials.php');
require_once('content-types/projects.php');

// 2. Add support for thumbnails
add_theme_support('post-thumbnails');
