<?php
///
///@file rand.php
///@brief web service for generating random textures from server
///

///
///@addtogroup ps
///@{
///

///
///@namespace rand
///@brief image randomization interface
///
namespace ps\image\rand;
//
// define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
// define('INC_DIR', ROOT_DIR . '/include/');
// call_user_func(function(){
//$DIR = dirname(__FILE__);

foreach([
    $_SERVER['DOCUMENT_ROOT'] . "/php/crypto/image/image"
] as $p){
    require_once "$p.php";
}
// });
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
//require_once '../image.php';
//
//use function re\isUint as isUInt;
//

// call_user_func('ps\\image\\createProcRGBi',
// function($x,$y){
    // return randColor24ui();
// });//pxCreateImgFill');
//

///
///@brief returns an RGB PNG image of size WxH, initialized with random colors
///
function rgb($width=null,$height=null)
{
    call_user_func('ps\\image\\createProcRGBi',
    function($x,$y){
        return randColor24ui();
    });
}
///
///@brief returns an RGB PNG image of size SxS, initialized with random colors
///
function rgbSquare($size=null)
{
    call_user_func('ps\\image\\createProcRGBiSquare',
    function($x,$y){
        return randColor24ui();
    });
}

// function greyscale()
// {
    // call_user_func('ps\\image\\createProcGreyscale',
    // function($x,$y){
        // return 0;//rand\uchar();
    // });
// }
// function greyscaleSquare()
// {
    // call_user_func('ps\\image\\createProcGreyscaleSquare',
    // function($x,$y){
        // return 0;//rand\uchar();
    // });
// }
//
//randomly generated normalized image
//

///
///@brief returns an RGB PNG image of size SxS, initialized with normalized random colors
///
function rgbSquareNorm($size=null)
{
    call_user_func('ps\\image\\createProcRGBiSquare',
    function($x,$y){
        //
        $c=randColor24ui();
        //
        $INV=1.0/255.0;
        $r=$c['r']*$INV;
        $g=$c['g']*$INV;
        $b=$c['b']*$INV;
        
        $m=sqrt($r*$r+$g*$g+$b*$b);
        
        if($m<=4.0e-8){
            return $c;
        }
        
        $c['r']=($r/$m)*255;
        $c['g']=($g/$m)*255;
        $c['b']=($b/$m)*255;
        
        // return array(
            // 'r'=>($r/$m)*255,
            // 'g'=>($g/$m)*255,
            // 'b'=>($b/$m)*255    
        // );
        return $c;
    }, $size);
}
///
///@brief returns an RGB PNG image of size WxH, initialized with random colors from a palette
///@arg pal an array representing a color palette containing colors to randomly select between
///
function rgbPalette($pal){
    //$pal is a palette containing 1 or more colors values
    call_user_func('ps\\image\\createProcRGBi',
    function($x,$y)use($pal){
        //paletted random texture
        // //global $map;
        //
        $C=count($pal);
        $ri=rand(0,$C-1);
        $c=$pal[$ri];
        //
        return $c;
    });
}

function rgba(){
    call_user_func('ps\\image\\createProcRGBAiSquare',
    function($x,$y){
        
    });
}
// function rgbSquarePalette(){
    // call_user_func('ps\\image\\createProcRGBiSquare',
    // function($x,$y){
        // //paletted random texture
        // global $map;
        // //
        // $C=count($map);
        // $ri=rand(0,$C-1);
        // $c=$map[$ri];
        // //
        // return $c;
    // });
// }

///
///@}
///
?>