<?php
///
///@file image.php
///@brief web service api for generating rgba images from server url requests
///@note php does not support generating pure alpha images, there must always be a background color to blend with.
///

///
///@namespace ps
///@brief namespace for all photoscript image and string operations
///
namespace ps\create\rgba;
//
require_once 'image.php';
//namespace ps\image\create;
//use function imagecreate as _create;
//use function ps\image\createPNG as _createRGB;
//
use function ps\image\sendPNG as _sendPNG;
//use function ps\image\createRGB as _createRGB;
use function imagecreatetruecolor as _create;
// use function imagecreatefromstring as createFromStr;
// use function imagecreatefrompng as createFromPNG;
// //use function imagecreatefromwbmp as createFromWBMP;
// use function imagecreatefromjpeg as createFromJPEG;
// //use function imagecreatefrombmp as createFromBMP;
// use function imagecreatefromgif as createFromGIF;
//
//output data stream as a specific image type
use function imagepng as toPNG;
use function imagegif as toGIF;
use function imagejpeg as toJPEG;
//use function imagewbmp as toWBMP;
//draw/fill operations
use function imagefill as _fill;
//
use function imagefilledellipse as filledEllipse;
//
use function imagefilter as filter;
//use function imageflip as flip;
use function imagesetpixel as _setPx;
use function ps\image\_destroy as _destroy;
//
//namespace ps\image\color;
//
use function imagecolorallocate as _colorAlloc;
use function imagecolordeallocate as _colorDealloc;
use function imagecolorallocatealpha as _allocAlpha;
///
///@note only GIF and PNG files support transparency.
///
function square($proc,$size=null){   //,$bg=null){
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
    $img=_create($size, $size);//,NULL,9,PNG_NO_FILTER);
    //alpha channel is represented using an 7-bit value with 0 being fully opaque, 127 being fully transparent and 63 representing 128, and 64 for 127
    //$bg=_allocAlpha($img, 0,255,0,0);
    $bg=_allocAlpha($img, 0,0,0,127);
    //$c=colorAlloc($img, 255, 0, 0);
    
    //fill image with transparent background
    _fill($img,0,0, $bg);    //clear to transparent background
    imagecolortransparent($img, $bg);   //tell php to make all black pixels transparent
    
    //filledEllipse($img,32,32, 8, 8, $c);
    for($i = 0; $i < $size; $i++){
        for($j = 0; $j < $size; $j++){
            $c=$proc($j,$i);
            //convert from [0,255] to [127,0]
            $c[3]=((~((int)$c[3])) & 0xff) >> 1;
            // //echo json_encode($c);
            $col=_allocAlpha($img, ...array_values($c));  //_allocAlpha($img,255,0,0,65);
            _setPx($img,$j,$i,$col);
            _colorDealloc($img, $col);
        }
    }
    //die();
    //
    //enable additional compression using ob_start() or deflate using apache but since png images are already compressed using deflate this would be redundant
    //
    _sendPNG($img);
    _colorDealloc($img,$bg);
    _destroy($img);
}
//red channel only
//
// function red($proc,$size=null){   //,$bg=null){
    // //
    // if($size===null){
        // $size=64;   //gSize('s');
    // }
    // // if($bg===null){
        // // $bg=[
            // // 0,0,0,0
        // // ];
    // // }
    // //$size=intval($size);  //make sure to convert to integer
    // //$s=gSize('s');
    // //
    // $img=createRGB($size, $size);//,NULL,9,PNG_NO_FILTER);
    // //alpha channel is represented using an 7-bit value with 0 being fully opaque, 127 being fully transparent and 63 representing 128, and 64 for 127
    // //$bg=_allocAlpha($img, 0,255,0,0);
    // $bg=_allocAlpha($img, 0,0,0,127);
    // //$c=colorAlloc($img, 255, 0, 0);
    
    // //fill image with transparent background
    // fill($img,0,0, $bg);    //clear to transparent background
    // imagecolortransparent($img, $bg);   //tell php to make all black pixels transparent
    
    // //filledEllipse($img,32,32, 8, 8, $c);
    // for($i = 0; $i < $size; $i++){
        // for($j = 0; $j < $size; $j++){
            // $c=$proc($j,$i);
            // //convert from [0,255] to [127,0]
            // $c[3]=((~((int)$c[3])) & 0xff) >> 1;
            // // //echo json_encode($c);
            // $col=_allocAlpha($img, ...array_values($c));  //_allocAlpha($img,255,0,0,65);
            // setPx($img,$j,$i,$col);
            // colorDealloc($img, $col);
        // }
    // }
    // //die();
    // //
    // //enable additional compression using ob_start() or deflate using apache but since png images are already compressed using deflate this would be redundant
    // //
    // sendPNG($img);
    // colorDealloc($img,$bg);
    // _destroy($img);
// }
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