<?php
///
///@file rgb.php
///@brief web service for generating random RGB textures from server
///

///
///@addtogroup ps
///@{
///

///
///@namespace rand
///@brief image randomization interface
///

// define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
// define('INC_DIR', ROOT_DIR . '/include/');

//echo INC_DIR;
// //
//require_once INC_DIR . 're.php';
//
// define('COLOR_MAX', 255);
// define('IMG_MAX_SIZE', 1048576); //max size of images is a total of 1MB
// define('IMG_DIMENSION_MAX', 256);   //1024); //max width and/or height, ei an image of 1024x1024=1MB

//define('S', 's');
//define('W', 'w');
//define('H', 'h');
//define('R', 'r');
//define('G', 'g');
//define('B', 'b');
//define('A', 'a');
//
// use function imagecreatetruecolor as imgCreateRGB;
// use function imagefill as fill;
// use function imagepng as toPNG;
// use function imagesetpixel as setPx;
//
//require_once 're.php';
require_once dirname(__FILE__) . '/rand.php';
//
//use function re\isUint as isUInt;
use function ps\image\rand\rgb as rgbPNG;
//

// call_user_func('ps\\image\\createProcRGBi',
// function($x,$y){
    // return randColor24ui();
// });//pxCreateImgFill');
//
rgbPNG();
///
///@}
///
?>