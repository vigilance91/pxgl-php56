<?php
///
///@file fill.php
///@brief generate a RGB png texture of filled with random color, {r,g,b}or{c=#RRGGBB} from server upon url request
///

///
///@todo fix bug, doesn't work properly
///

//namespace ps\rand;

require_once dirname(__FILE__) . '/rand.php';
//
use function imagecreatetruecolor as createRGB;
//
use function imagefill as fill;
use function imagedestroy as _destroy;
//
use function imagecolorallocate as colorAlloc;
use function imagecolordeallocate as colorDealloc;
//
// use function ps\image\createRGB;
// use function ps\image\pngFill;
// use function ps\image\gSize;
// use function ps\image\sendPNG;
// use function ps\image\_destroy;
// use function ps\image\colorDealloc;
// use function ps\image\createRGB;//,NULL,9,PNG_NO_FILTER);
// use function ps\image\colorAlloc;
// use function ps\image\fill;
//
// function rFill(){//$width, $height, $red, $green, $blue){
    // //creates and image, filling it with color
    // $w=gSize('w'); //$_GET['w']?$_GET['w']:256;
    // $h=gSize('h');
    // //
    // $col=randColor24ui();
    // //create a 256x256 rgb image
    // //NULL sets image to be output directly to output stream
    // $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    // $c=colorAlloc($img, 0,0,0);//...array_values($col));

    // //imagesetpixel($img, 0,0, $c);
    // imagefill($img,0,0,$c);
    
    // // for($i = 0; $i < 100000; $i++){
      // // imagesetpixel($gd, round($x),round($y), $red);
      // // $a=rand(0, 2);
      // // $x=($x + $corners[$a]['x']) / 2;
      // // $y=($y + $corners[$a]['y']) / 2;
    // // }
    // //
    // sendPNG($img);
    // _destroy($img);
    // colorDealloc($c);
// }

///
///@brief returns an RGB PNG image of size WxH, filled with a solid random color
///
function rFill(
    $r=null,
    $g=null,
    $b=null
){
    //creates and image, filling it with color
    $w=ps\image\gSize('w'); //$_GET['w']?$_GET['w']:256;
    $h=ps\image\gSize('h');
    
    // $r=uchar();
    // $g=uchar();
    // $b=uchar();
    if($r===null){
        $r=uchar();
    }
    if($g===null){
        $g=uchar();
    }
    if($b===null){
        $b=uchar();
    }
    //
    //echo "#{$r}-{$g}-{$b}";
    //
    //exit();
    //create a 256x256 rgb image
    //NULL sets image to be output directly to output stream
    $img=createRGB($w, $h);//,NULL,9,PNG_NO_FILTER);
    $c=colorAlloc($img, $r, $g, $b);
    //
    //echo "#{$c}";
    //die();
    //
    fill($img,0,0,$c);
    //
    ps\image\sendPNG($img);
    _destroy($img);
    colorDealloc($c);
}
//rFill();
?>