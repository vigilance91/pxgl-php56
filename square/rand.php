<?php
//
//generation of random textures from server url request
//
//
//require_once 're.php';
require_once '../random/rand.php';
//
//use function re\isUint as isUInt;
use function ps\image\rand\rgbSquareNorm as rgbSquareNorm;
//

// call_user_func('pxCreateImgProcRGBi',
// function($x,$y){
    // return randColor24ui();
// });//pxCreateImgFill');
//
$map=array(
    // array(
        // 'r'=>0,
        // 'g'=>0,
        // 'b'=>0
    // ),
    array(
        'r'=>255,
        'g'=>0,
        'b'=>0
    ),
    array(
        'r'=>0,
        'g'=>255,
        'b'=>0
    ),
    array(
        'r'=>255,
        'g'=>255,
        'b'=>0
    )
    // array(
        // 'r'=>0,
        // 'g'=>0,
        // 'b'=>255
    // ),
    // array(
        // 'r'=>255,
        // 'g'=>0,
        // 'b'=>255
    // ),
    // array(
        // 'r'=>0,
        // 'g'=>255,
        // 'b'=>255
    // ),
    // array(
        // 'r'=>255,
        // 'g'=>255,
        // 'b'=>255
    // )
);




//rgbSquareNorm();
//
//
//

// function randSquareRBGPalette(){
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
//}
//
//
// call_user_func('ps\\image\\createProcRGBi',
// function($x,$y){
    // $c=randColor24ui();
    
    // //
    // $rEven = ($x & 0x1) != 1;
    // //$cEven = ($y & 0x1) != 1;
        
    // //$c['b']=0;
    // // $r['r']=0;
    // // $r['g']=0;
    // if($rEven){
        // $c['r']=0;
    // }
    // else{
        // $c['g']=0;
    // }
    // $r=$c['r'];
    // $g=$c['g'];
    // $b=$c['b'];
    // //
    // // $m=sqrt($r*$r+$g*$g+$b*$b);
    
    // // if($m<=4.0e-8){
        // // return $c;
    // // }
    
    // // $c['r']=$r/$m;
    // // $c['g']=$g/$m;
    // // $c['b']=$b/$m;
    
    // return $c;
// });//pxCreateImgFill');
//

//namespace image\color;
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