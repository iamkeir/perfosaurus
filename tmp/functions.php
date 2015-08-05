<?php

// iptc_make_tag() function by Thies C. Arntzen
function iptc_make_tag($rec, $data, $value)
{
    $length = strlen($value);
    $retval = chr(0x1C) . chr($rec) . chr($data);

    if($length < 0x8000)
    {
        $retval .= chr($length >> 8) .  chr($length & 0xFF);
    }
    else
    {
        $retval .= chr(0x80) .
                   chr(0x04) .
                   chr(($length >> 24) & 0xFF) .
                   chr(($length >> 16) & 0xFF) .
                   chr(($length >> 8) & 0xFF) .
                   chr($length & 0xFF);
    }

    return $retval . $value;
}

function resize_file($path, $kb_to_increase_by, $output) {
  $kb = (1000 / 8);

  $amount = ( ($kb * $kb_to_increase_by) * 8);
  $stuff = '';

  for($i = 0; $i < $amount; $i++) {
    $stuff .= '1';
  }

  // Set the IPTC tags
  $iptc = array(
      '2#120' => $stuff
  );

  // Convert the IPTC tags into binary code
  $data = '';

  foreach($iptc as $tag => $string)
  {
      $tag = substr($tag, 2);
      $data .= iptc_make_tag(2, $tag, $string);
  }

  // Embed the IPTC data
  $content = iptcembed($data, $path);

  // Write the new image data out to the file.
  $fp = fopen($output, "wb");
  fwrite($fp, $content);
  fclose($fp);
}
