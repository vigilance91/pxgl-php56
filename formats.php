<?php
///
///@file create.php
///@brief web service api for generating images from server url requests
///

///
///@namespace create
///@brief namespace for creating images
///
namespace ps;
//
//require_once 're.php';
//
//use function re\isUint as isUInt;
//
use function imagepng as toPNG;
use function imagegif as toGIF;
//use function imagejpeg as toJPG;
//use function imagewbmp as toWBMP;
//
//use function ps\send\png as sendPNG;

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
//
// function sendJPG($img){
    // //$img data to send as a JPG
    
    // header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate');
    // header('Expires: Thur, 1 Jan 1970 00:00:00 GMT'); //unix epoch
    // header('Pragma: no-cache');
    // header('Cache-Control: post-check=0, pre-check=0', false);
    // header('Content-Type: image/jpeg');
    // //
    // toJPG($img);
    // //clean up
    // //imagedestroy($img);
// }

//
?>