<?php
///
///@file palette.php
///@brief generate a RGB png texture filled with a randomized palette of colors, from server upon url request
///
require_once 'rand.php';
//
use function ps\image\rand\rgbPalette as rgbPalette;
//
//use function re\isAlphaSmall as isAlphaSmall;
//
//function gProc(){
    //get a string representing
//}
//$p=gProc();

//if($p==''){
    //die('invalid procedure)
//}

// class color extends array{
    // // public __construct($r=0,$g=0,$b=0){
        
    // // }
    //toHex(){
        //$r=;
        //$g=;
        //$b=;
        //return "#{$r}{$g}{$b}";
    //}
    //toHSL(){
        
    //}
    //normalize(){
        
    //}
// }

$primary=array(
    array(
        'r'=>0,
        'g'=>0,
        'b'=>0
    ),
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
    ),
    array(
        'r'=>0,
        'g'=>0,
        'b'=>255
    ),
    array(
        'r'=>255,
        'g'=>0,
        'b'=>255
    ),
    array(
        'r'=>0,
        'g'=>255,
        'b'=>255
    ),
    array(
        'r'=>255,
        'g'=>255,
        'b'=>255
    )
);
$secondary=array(
    //+
    array(
        'r'=>255,
        'g'=>127,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>255,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>127,
        'b'=>255
    ),
    //-
    array(
        'r'=>0,
        'g'=>127,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>0,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>127,
        'b'=>0
    )
);
$tertiary=array(
    array(
        'r'=>255,
        'g'=>255,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>255,
        'b'=>255
    ),
    array(
        'r'=>255,
        'g'=>127,
        'b'=>255
    ),
    //-
    array(
        'r'=>0,
        'g'=>0,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>0,
        'b'=>0
    ),
    array(
        'r'=>0,
        'g'=>127,
        'b'=>0
    ),
    //
    //new vec3(-1,1,0), new vec3(0,1,-1), new vec3(1,0,-1),
    //new vec3(1,-1,0), new vec3(0,-1,1), new vec3(-1,0,1)
    //
    array(
        'r'=>0,
        'g'=>255,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>255,
        'b'=>0
    ),
    array(
        'r'=>255,
        'g'=>127,
        'b'=>0
    ),
    //-
    array(
        'r'=>255,
        'g'=>0,
        'b'=>127
    ),
    array(
        'r'=>127,
        'g'=>0,
        'b'=>255
    ),
    array(
        'r'=>0,
        'g'=>127,
        'b'=>255
    )
);
//switch($p){
    //case 'RGY':
        // rgbPalette(array(
            // array(
                // 'r'=>255,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>255,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>255,
                // 'g'=>255,
                // 'b'=>0
            // )
        // )
    //);
    //break;
    //case 'RGB':
        // rgbPalette(array(
            // array(
                // 'r'=>255,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>255,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>255
            // )
        // )
    //);
    //break;
    //case 'GYB':
        // rgbPalette(array(
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>255
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>255,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>255,
                // 'g'=>255,
                // 'b'=>0
            // )
        // )
    //);
    //break;
    //case 'YBM':
        // rgbPalette(array(
            // array(
                // 'r'=>255,
                // 'g'=>255,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>255
            // ),
            // array(
                // 'r'=>255,
                // 'g'=>0,
                // 'b'=>255
            // )
        // )
    //);
    //break;
    //case 'BMC':
        // rgbPalette(array(
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
            // )
        // )
    //);
    //break;
    //case 'MCW':
        // rgbPalette(array(
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
        // )
    //);
    //break;
    //
    //case 'KRBPu':
        ////for Autumn
        // rgbPalette(array(
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>255,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>255
            // ),
            // array(
                // 'r'=>127,
                // 'g'=>0,
                // 'b'=>255
            // )
        // ));
        // break;
    //case '':
        // rgbPalette(array(
            // array(
                // 'r'=>0,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>255,
                // 'g'=>0,
                // 'b'=>0
            // ),
            // array(
                // 'r'=>0,
                // 'g'=>127,
                // 'b'=>191
            // ),
            // array(
                // 'r'=>64,
                // 'g'=>255,
                // 'b'=>64
            // )
        // ));
    //break;
    //case 'primary':
        // rgbPalette($primary);
    //break;
    //case 'secondary':
        // rgbPalette($secondary);
    //break;
    
    //case 'tertiary':
        //
        // new vec3(1,1,0), new vec3(0,1,1), new vec3(1,0,1),
        // new vec3(-1,-1,0), new vec3(0,-1,-1), new vec3(-1,0,-1),
        //
        //rgbPalette($tertiary);
    //break;
    
    //case 'core':
        rgbPalette($primary+$secondary+$tertiary);
    //break;
    // default:
        // break;
//}
?>