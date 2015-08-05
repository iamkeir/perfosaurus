<?php
include('../functions.php');

define('BYTES_IN_KB', 1000);
define('ONE_KB_IN_BYTES', (1000 / 8));
define('KB_IN_ONE_MB', 1000);

// processing images in kb
// want each file to equal 2mb

$mb_to_reach = 2;

// each image we want to process
$images = array(
  '100x100.jpg',
  '250x250.jpg',
  '1000x1000.jpg',
  '2000x2000.jpg'
);

foreach ($images as $image) {
  $image_size_in_kb = filesize($image) / BYTES_IN_KB;
  $kb_in_two_2mb = KB_IN_ONE_MB * $mb_to_reach;
  $kb_to_add = $kb_in_two_2mb - $image_size_in_kb;
  $output_path = './output/' . $image;
  resize_file($image, $kb_to_add, $output_path);
  $output_size_in_kb = filesize($output_path) / BYTES_IN_KB;

  echo $image . ' is ' .  $image_size_in_kb . 'kb';
  echo "\r\n";
  echo $kb_to_add . 'kb needs adding';
  echo "\r\n";
  echo $output_path . ' is ' .  $output_size_in_kb . 'kb';
  echo "\r\n";
  echo "\r\n";
}

// close the file off
echo "\r\n";
