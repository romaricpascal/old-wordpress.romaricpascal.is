#!/usr/bin/env php
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  if(!isset($argv[1])) {
    die('Please provide a JSON file with the data to load');
  }
  $source = $argv[1];

  if(empty($_SERVER['HTTP_HOST'])) {
    if (!isset($argv[2])) {
      die('Please provide the host to use for generating URLs');
    }
    $_SERVER['HTTP_HOST'] = $argv[2];
  }

  // Load wordpress so we can use its functions
  require_once('wordpress/wp-load.php');

  $upload_dir = wp_upload_dir();

  var_dump($upload_dir);

  $data = json_decode(file_get_contents($source . '/media.json'));

  foreach ($data as $datum) {

    $parts = explode('/',$datum->src);
    array_shift($parts);
    $img_path = join('/',$parts);

    $filename = $upload_dir['basedir'].'/'.$img_path;
    $filetype = wp_check_filetype(basename($img_path), null);

    if(!(strpos($datum->date,'2015') === 0) && $filetype['ext']!=='mp4') {
      echo 'Importing image from '. $datum->date."\n";

      $post_id = wp_insert_post([
        post_content => $datum->caption,
        post_date => $datum->date,
        post_status => 'publish',
        post_author => 1,
        post_type => 'artwork'
      ]);

      $attachment = [
      	'guid'           => $upload_dir['baseurl'] . '/' . $img_path ,
        'post_date'      => $datum->date,
      	'post_mime_type' => $filetype['type'],
      	'post_title'     => preg_replace( '/\.[^.]+$/', '', basename($filename) ),
      	'post_content'   => '',
      	'post_status'    => 'inherit'
      ];

      // Insert the attachment.
      $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );

      // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
      require_once( 'wordpress/wp-admin/includes/image.php' );
      // And this one for the video
      require_once('wordpress/wp-admin/includes/media.php');

      // Generate the metadata for the attachment, and update the database record.
      $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
      wp_update_attachment_metadata( $attach_id, $attach_data );

      set_post_thumbnail( $post_id, $attach_id );
    }
  }
