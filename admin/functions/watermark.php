<?php
function watermark_image($oldimage_name, $new_image_name)
{
$image_path = '../design/watermark.png';
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = $owidth;
$height = $oheight;
$im = imagecreatetruecolor($width, $height);
$img_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$watermark = imagecreatefrompng($image_path);
list($w_width, $w_height) = getimagesize($image_path);
$pos_x = $width/2-110;
$pos_y = $height/2-110;
imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
imagejpeg($im, $new_image_name, 100);
imagedestroy($im);
//unlink($oldimage_name);
return true;
}
?>