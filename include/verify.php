<?php
define("WIDTH", 80);
define("HEIGHT",20);
define("NUMS",4);	// the number of numbers

$code = "";
for($i=0;$i<NUMS;$i++) $code .= rand(0, 9);

session_start();
$_SESSION['verify_code'] = $code;

header("Content-type: image/png");

$im = imagecreate(WIDTH, HEIGHT);

$black = imagecolorallocate($im, 0, 0, 0);
$gray = imagecolorallocate($im, 200, 200, 200);
$darkgray = imagecolorallocate($im, 100, 100, 100);

imagefill($im, 0, 0, $gray);

// dash-line
$style = array($darkgray, $darkgray, $darkgray, $darkgray, $darkgray, $gray, $gray, $gray);
imagesetstyle($im, $style);
function rand_x(){return rand(0, WIDTH);}
function rand_y(){return rand(0, HEIGHT);}
imageline($im, 0, rand_y(), WIDTH, rand_y(), IMG_COLOR_STYLED);
imageline($im, 0, rand_y(), WIDTH, rand_y(), IMG_COLOR_STYLED);

// noise
for($i=0;$i<80;$i++){
	imagesetpixel($im, rand_x(), rand_y(), $black);
}

// number
$strx = WIDTH/(NUMS+1)/2;
for($i=0; $i<NUMS; $i++){
	$strpos = rand(1,5);
	imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
	$strx += WIDTH/(NUMS+1);
}

imagepng($im);
imagedestroy($im);
?> 