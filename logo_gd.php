<?php
$filename="content/g4326.png";
$img=imagecreatefrompng($filename);
$xsize=imagesx($img);
$ysize=imagesy($img);
$bbox=imagettfbbox(120,0,"arial.ttf","cloudcomp.ru");
$width=abs($bbox[4]-$bbox[0]);
$height=abs($bbox[5]-$bbox[1]);
$x=$xsize/2-$width/2;
$y=$ysize/2+$height/2;
imagettftext($img,120,0,$x,$y,0x000044FF,"arial.ttf","cloudcomp.ru");
imagesavealpha($img, true);
header("Content-type: image/png");
imagePng($img);
imageDestroy($img);
?>