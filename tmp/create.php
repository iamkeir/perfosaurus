<?php

  // create image and deliver to browser
  header ('Content-Type: image/png');

  $width = 640;
  $height = 480;

  $im = @imagecreatetruecolor($width, $height) // create image
      or die('Cannot Initialize new GD image stream');

  // colour
  $bg_color = imagecolorallocate($im, 204, 204, 204);
  imagefill($im, 0, 0, $bg_color);

  // text
  //$text_color = imagecolorallocate($im, 255, 255, 255);
  //imagestring($im, 1, 0, 0, 'ROOOOARR', $text_color);

  imagejpeg($im); // output image

  imagedestroy($im); // free up memory

?>
