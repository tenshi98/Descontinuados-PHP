<?php
session_start(); 
//cálculo Ancho automático de la caja
$x=60;//ancho de la caja
$y=20;//alto de la caja
$hori = 5;
$verti = 10;
$rhori = rand(-$hori, $hori);
$rverti = rand(-$verti, $verti);	
//Creacion de la imagen
$img_number = imagecreate($x,$y);
//Color de fondo
$backcolor = imagecolorallocate($img_number,255, 255, 255);
//Color del texto
$textcolor = imagecolorallocate($img_number,0, 0, 0);
//Color de las lineas
$lineColor = imagecolorallocate($img_number, 0, 0, 0);
//se escriben lineas horizontales
imageline($img_number, 0, $rhori, 200, $rhori, $lineColor);
imageline($img_number, 0, $rhori+20, 200, $rhori+20, $lineColor);
//se escriben lineas verticales, 
imageline($img_number, $rverti, 0, 25, 700, $lineColor);
imageline($img_number, $rverti+20, 0, 25, 700, $lineColor);	
//se almacenan valores	
imagefill($img_number,0,0,$backcolor);
$number=$_SESSION['mipass'];
Imagestring($img_number,10,5,6,$number,$textcolor);
header("Content-type: image/png");
imagepng($img_number);
//destruye la imagen del servidor
imagedestroy($img_number); 
?>

