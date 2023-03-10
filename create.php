<?php
///
///@file create.php
///@brief web service api for generating images from server url requests
///

///
///@namespace create
///@brief namespace for creating images
///
namespace ps\create;
//
call_user_func(function(){
    $d=dirname(__FILE__);
    
    foreach([
        "$d/formats",
        "$d/colors",
        "$d/image"
    ] as $p){
        require_once "$p.php";
    }
});
//require_once 're.php';
//
//use function re\isUint as isUInt;
//
use function imagecreatetruecolor as createRGB;
//
use function ps\toPNG as toPNG;
use function ps\sendPNG as sendPNG;
//
use function imagesetpixel as _setPx;
use function imagedestroy as _destroy;
use function imagecolorallocate as _colorAlloc;
use function imagecolordeallocate as _colorDealloc;
use function imagecolorallocatealpha as _allocAlpha;
//
//use function ps\send\png as sendPNG;

use function ps\image\gSize as gSize;
use function ps\image\gColor as gColor;
//
//namespace ps\create\png;
///
///@return png image filled with colors r,g,b passed as get parameters
///@brief png image to browser or file
///
function fill(){//$width=1, $height=1, $red=null, $green=null, $blue=null){
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
    $c=_colorAlloc($img, $r, $g, $b);

    fill($img,0,0,$c);
    
    // for($i = 0; $i < 100000; $i++){
      // imagesetpixel($gd, round($x),round($y), $red);
      // $a=rand(0, 2);
      // $x=($x + $corners[$a]['x']) / 2;
      // $y=($y + $corners[$a]['y']) / 2;
    // }
    //
    sendPNG($img);
    _colorDelloc($c);
    _destroy($img);
}
///
///@return greyscale image
///@arg proc a function taking arguments x,y returning an unsigned char
///@brief output procedurally generated greyscale png image to browser or file
///
function greyScale(
    $proc,
    $w=null,
    $h=null
){
    if($w===null){
        $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    }
    if($h===null){
        $h=gSize('h');
    }
    //
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    //$c=_colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $h; $i++){
        for($j = 0; $j < $w; $j++){
            $c=$proc($j,$i);
            //assert(typeof $c ===int);
            $col=_colorAlloc($img, $c, $c, $c);
            _setPx($img,$j,$i,$col);
            _colorDealloc($img, $col);
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
function rgbI($proc){
    $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    $h=gSize('h');
    //
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    //$c=_colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $h; $i++){
        for($j = 0; $j < $w; $j++){
            $c=$proc($j,$i);
            //echo json_encode($c);
            $col=_colorAlloc($img, ...array_values($c));
            _setPx($img,$j,$i,$col);
            _colorDelloc($img, $col);
        }
    }
    //die();
    //
    //enable additional compression using ob_start()
    //
    sendPNG($img);
    _destroy($img);
}

function rgbISquare($proc,$size=null){
    //
    if($size===null){
        $size=gSize('s');
    }
    //$size=intval($size);  //make sure to convert to integer
    //$s=gSize('s');
    //
    $img=createRGB($size, $size);//,NULL,9,PNG_NO_FILTER);
    //$c=_colorAlloc($img, $r, $g, $b);
    
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $size; $j++){
            $c=$proc($j,$i);
            //echo json_encode($c);
            $col=_colorAlloc($img, ...array_values($c));
            _setPx($img,$j,$i,$col);
            _colorDelloc($img, $col);
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