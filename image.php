<?php
///
///@file image.php
///@brief web service api for generating images from server url requests
///

///
///@namespace ps
///@brief namespace for all photoscript image and string operations
///
namespace ps\image;
//

///@todo make script for creating PNG then send to FTP server for storage

// Socretes-I know that i know nothing

// modern day, Godel's incompleteness
// *no formal axiomatic system is capable of proving truth within itself,
    // statement exists which are true but unprovable within the system.
    
// *no formal axiomatic system can demonstrate its own consistency

// Tarski's undefinability theorem
// * the axioms of any formal system are incapable of defining a predicate of truth within it self

// define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
// define('INC_DIR', ROOT_DIR . '/include/');

//echo INC_DIR;
// //
//require_once INC_DIR . 're.php';
//
define('COLOR_MAX', 255);
define('IMG_MAX_SIZE', 1048576); //max size of images is a total of 256*256==65536==64KB    //1024*1024=1MB
//define('IMG_MIN_SIZE', 1*1*3); //max size of images is a total of 256*256==65536==64KB    //1024*1024=1MB
define('IMG_DIMENSION_MAX', 2048);   //1024); //max width and/or height, ei an image of 1024x1024=1MB
define('IMG_DIMENSION_MIN', 1);   //1024); //max width and/or height, ei an image of 1024x1024=1MB
//define('IMG_DIMENSION_MIN', 1);
//
//define('S', 's');
//define('W', 'w');
//define('H', 'h');
//define('R', 'r');
//define('G', 'g');
//define('B', 'b');
//define('A', 'a');
//
//namespace ps\image\create;
//use function imagecreate as _create;
use function imagecreatetruecolor as createRGB;
use function imagecreatefromstring as createFromStr;
use function imagecreatefrompng as createFromPNG;
//use function imagecreatefromwbmp as createFromWBMP;
use function imagecreatefromjpeg as createFromJPEG;
//use function imagecreatefrombmp as createFromBMP;
use function imagecreatefromgif as createFromGIF;
//
//output data stream as a specific image type
use function imagepng as toPNG;
use function imagegif as toGIF;
use function imagejpeg as toJPEG;
//use function imagewbmp as toWBMP;
//
//conversions
//use function jpeg2wbmp as jpeg2wbmp;
//use function png2wbmp as png2wbmp;
//
//
//transforms
//use function imagerotate as rotate;
//use function imagescale as scale;
//draw/fill operations
use function imagestring as str;    //draw horizontal string
use function imagestringup as strUp;    //draw horizontal string
use function imagefill as fill;
//use function imagecrop as crop;
use function imageline as line;
use function imageellipse as ellipse;
use function imagepolygon as polygon;
use function imagerectangle as rectangle;
use function imagefilledellipse as filledEllipse;
use function imagefilledpolygon as filledPolygon;
use function imagefilledrectangle as filledRectangle;
//
use function imagefilter as filter;
//use function imageflip as flip;
use function imagesetpixel as setPx;
use function imagedestroy as _destroy;
//
//namespace ps\image\color;
//
use function imagecolorallocate as colorAlloc;
use function imagecolordeallocate as colorDealloc;
use function imagecolorallocatealpha as _allocAlpha;
//
//use function imagecreate as _create;
//use function imagecreatefromstring as fromString;
//
//require_once 're.php';
require_once 'colors.php';
//
//use function re\isUint as isUInt;
//

///
///@arg img a resource created with imagecreatetruecolor
///@brief outputs png image to browser
///
function sendPNG($img){
    //$img data to send as a PNG, must have been created using imagecreatetruecolor
    
    header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate');
    header('Expires: Thur, 1 Jan 1970 00:00:00 GMT'); //unix epoch
    header('Pragma: no-cache');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Content-Type: image/png');
    //
    toPNG($img);
    //clean up
    //imagedestroy($img);
}
// function sendGIF($img){
    // //$img data to send as a PNG, must have been created using imagecreatetruecolor
    
    // header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate');
    // header('Expires: Thur, 1 Jan 1970 00:00:00 GMT'); //unix epoch
    // header('Pragma: no-cache');
    // header('Cache-Control: post-check=0, pre-check=0', false);
    // header('Content-Type: image/gif');
    // //
    // toGIF($img);
    // //clean up
    // //imagedestroy($img);
// }

///

///
///@arg str a string key
///@brief returns an integer value between [0,255] if str exists as a get parameter, otherwise returns 0
///
function gColor($str){
    $k=htmlspecialchars($str);
    $v=isset($_GET[$k])?$_GET[$k]:'';
    
    if($v===''){
        //die("get parameter with key:{$k}, not set");
        return 0;
    }
    
    //if(isUInt($v)){
        $i=intval($v);    //int value in php are signed
        //clamp between 0 and DIM_MAX
        return $i <=0?0:($i>COLOR_MAX?COLOR_MAX:$i);
    //}
    
    //die("get parameter with key:{$k}, is not an unsigned integer value");
}
function gSize($str){
    //
    $k=htmlspecialchars($str);
    $v=isset($_GET[$k])?$_GET[$k]:'';
    
    //die("${v}");
    
    if($v===''){
        //die("get parameter with key:{$k}, not set");
        return IMG_DIMENSION_MIN;
    }
    
    //ensure string data is formated as an integer value
    //if(isUInt($v)){
        //if $v is not convertable to an integer, intval returns 0
        $i=intval($v);    //int value in php are signed
        //die("{$i}");
        //clamp between 0 and SIZE_MAX
        return $i <=0?1:($i>IMG_DIMENSION_MAX?IMG_DIMENSION_MAX:$i);
    //}
    
    //die("get parameter with key:{$k}, is not an unsigned integer value");
}

// function gSize(){
    // return [
        // gSize('w'), //$_GET['w']?$_GET['w']:256;
        // gSize('h')
    // ];
// }
// //
// function gRBG(){
    // return [
        // gColor('r'),
        // gColor('g'),
        // gColor('b')
    // ];
// }
//
//namespace ps\create\png;
///
///@return png image filled with colors r,g,b passed as get parameters
///@brief png image to browser or file
///
function createFill(){//$width, $height, $red, $green, $blue){
    //creates and image, filling it with color
    $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    $h=gSize('h');
    //
    $r=gColor('r');
    $g=gColor('g');
    $b=gColor('b');
    //create a 256x256 rgb image
    //NULL sets image to be output directly to output stream
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    $c=colorAlloc($img, $r, $g, $b);

    fill($img,0,0,$c);
    
    // for($i = 0; $i < 100000; $i++){
      // imagesetpixel($gd, round($x),round($y), $red);
      // $a=rand(0, 2);
      // $x=($x + $corners[$a]['x']) / 2;
      // $y=($y + $corners[$a]['y']) / 2;
    // }
    //
    sendPNG($img);
    _destroy($img);
    colorDealloc($c);
}
///
///@return greyscale image
///@arg proc a function taking arguments x,y returning an unsigned char
///@brief output procedurally generated greyscale png image to browser or file
///
function createProcGreyScale($proc){
    $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    $h=gSize('h');
    //
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    //$c=colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $h; $i++){
        for($j = 0; $j < $w; $j++){
            $c=$proc($j,$i);
            //assert(typeof $c ===int);
            $col=colorAlloc($img, $c, $c, $c);
            setPx($img,$j,$i,$col);
            colorDealloc($img, $col);
        }
    }
    //
    //enable additional compression using ob_start()
    //
    sendPNG($img);
    _destroy($img);
}
///
///@return RGB png image
///@arg proc a function taking arguments x,y returning an RGB color
///@brief output procedurally generated RGB png image to browser or file
///
function createProcRGBi($proc){
    $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    $h=gSize('h');
    //
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    //$c=colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $h; $i++){
        for($j = 0; $j < $w; $j++){
            $c=$proc($j,$i);
            //echo json_encode($c);
            $col=colorAlloc($img, ...array_values($c));
            setPx($img,$j,$i,$col);
            colorDealloc($img, $col);
        }
    }
    //die();
    //
    //enable additional compression using ob_start()
    //
    sendPNG($img);
    _destroy($img);
}

function createProcRGBiSquare($proc,$size=null){
    //
    if($size===null){
        $size=gSize('s');
    }
    //$size=intval($size);  //make sure to convert to integer
    //$s=gSize('s');
    //
    $img=createRGB($size, $size);//,NULL,9,PNG_NO_FILTER);
    //$c=colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $size; $j++){
            $c=$proc($j,$i);
            //echo json_encode($c);
            $col=colorAlloc($img, ...array_values($c));
            setPx($img,$j,$i,$col);
            colorDealloc($img, $col);
        }
    }
    //die();
    //
    //enable additional compression using ob_start()
    //
    sendPNG($img);
    _destroy($img);
}
//echo json_encode(randColor24ui());
//exit();
// call_user_func('pxCreateImgProcRGBi',function($x,$y){
    // return randColor24ui();
// });//pxCreateImgFill');
//
//namespace image;
//namespace ps\image\color;
//
//function allocate(){
    
//}

///
///@note only GIF and PNG files support transparency.
///
function createProcRGBAiSquare($proc,$size=null){   //,$bg=null){
    //
    if($size===null){
        $size=64;   //gSize('s');
    }
    // if($bg===null){
        // $bg=[
            // 0,0,0,0
        // ];
    // }
    //$size=intval($size);  //make sure to convert to integer
    //$s=gSize('s');
    //
    $img=createRGB($size, $size);//,NULL,9,PNG_NO_FILTER);
    //alpha channel is represented using an 7-bit value with 0 being fully opaque, 127 being fully transparent and 63 representing 128, and 64 for 127
    //$bg=_allocAlpha($img, 0,255,0,0);
    $bg=_allocAlpha($img, 0,0,0,127);
    //$c=colorAlloc($img, 255, 0, 0);
    
    //fill image with transparent background
    fill($img,0,0, $bg);    //clear to transparent background
    imagecolortransparent($img, $bg);   //tell php to make all black pixels transparent
    
    //filledEllipse($img,32,32, 8, 8, $c);
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $size; $j++){
            $c=$proc($j,$i);
            //convert from [0,255] to [127,0]
            $c[3]=((~((int)$c[3])) & 0xff) >> 1;
            // //echo json_encode($c);
            $col=_allocAlpha($img, ...array_values($c));  //_allocAlpha($img,255,0,0,65);
            setPx($img,$j,$i,$col);
            colorDealloc($img, $col);
        }
    }
    //die();
    //
    //enable additional compression using ob_start() or deflate using apache but since png images are already compressed using deflate this would be redundant
    //
    sendPNG($img);
    colorDealloc($img,$bg);
    _destroy($img);
}
//function allocateAlpha(){
    
//}
//function colorAt(){
    
//}
//function closest(){
    
//}
//function closestAlpha(){
    
//}
//function deallocate(){
    
//}
//function exact(){
    
//}
//function exactAlpha(){
    
//}
//function match(){
    
//}
//function resolve(){
    
//}
//function resolveAlpha(){
    
//}
//function set(){
    
//}
//function transparent(){
    
//}
?>