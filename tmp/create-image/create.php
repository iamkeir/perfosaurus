<?php

  //header ('Content-Type: image/png'); // allow us to server as image

  $width = 2640;
  $height = 2480;

  $im = @imagecreatetruecolor($width, $height) // create image
      or die('Cannot Initialize new GD image stream');

  // colour
  $bg_color = imagecolorallocate($im, 204, 204, 204);
  imagefill($im, 0, 0, $bg_color);

  // text
  //$text_color = imagecolorallocate($im, 255, 255, 255);
  //imagestring($im, 1, 0, 0, 'ROOOOARR', $text_color);

  imagejpeg($im,'raptor.jpg'); // output image

  imagedestroy($im); // free up memory

?>
