<?php
echo "Generating Wordpress salts\n";
$wp_salts_file='wp-salts.php';
$wp_salt_generator_url='https://api.wordpress.org/secret-key/1.1/salt/';
if (! file_exists($wp_salts_file)) {
  $salts = file_get_contents($wp_salt_generator_url);
  file_put_contents($wp_salts_file, "<?php\n" . $salts . "?>");
  echo "Wordpress salts generated in " . $wp_salts_file . "\n";
}
?>
