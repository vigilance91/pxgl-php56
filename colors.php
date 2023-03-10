<?php
///
///@file colors.php
///@brief web service for generating greyscale, rgb and rgba color values
///

//namespace colors
//namespace ps\colors;

///
///@addtogroup ps
///@{
///

//namespace image/blackwhite;
//namespace image/whiteblack;
//color16.fromStr = function(str){
    // $c = color16.hexToRGf(str);
    
    // if(c === null){
        // c = color24.black();
    // }

    // uColor[0] = c[0];
    // uColor[1] = c[1];
    // uColor[2] = c[2];
    // uColor[3] = 1.0;
// }



//color16.fromStr = function(str){
    // $c = color16.hexToRGf(str);
    
    // if(c === null){
        // c = color24.black();
    // }

    // uColor[0] = c[0];
    // uColor[1] = c[1];
    // uColor[2] = c[2];
    // uColor[3] = 1.0;
// }

//namespace pseudo\rand;
//

///
///@arg img a resource created with imagecreatetruecolor
///@brief generates a random int clamped to [0,255]
///
function uchar(){
    //return value is a single integer clamped to [0,255]
    return rand(0,255);
}
//function schar(){
    //return value is a single integer clamped to [-127,127]
    //return rand(-127,127);
//}

///
///@arg img a resource created with imagecreatetruecolor
///@brief generates a random int clamped to [0,127]
///
// function ascii(){
    // //return value is a single integer clamped to [0,127]
    // return rand(0,127);
// }
//

///
///@arg img a resource created with imagecreatetruecolor
///@brief generates a random RGB color, with each component in [0,255]
///
function randColor24ui(){
    return array(
        'r'=>uchar(),
        'g'=>uchar(),
        'b'=>uchar()
    );
}
// function randColor32ui(){
    // return array(
        // 'r'=>uchar(),
        // 'g'=>uchar(),
        // 'b'=>uchar(),
        // 'a'=>uchar()
    // );
// }
// function randColor32f(){
    // return array(
        // 'r'=>uchar(),
        // 'g'=>uchar(),
        // 'b'=>uchar(),
        // 'a'=>uchar()
    // );
// }
//
//function floatUN(){
    // return rand()/ PHP_INT_MAX;
//}
// function randColor24fUN(){
    // return array(
        // 'r'=>floatUN(),
        // 'g'=>floatUN(),
        // 'b'=>floatUN()
    // );
// }
//PHP 7+
// //namespace crypto\rand;
// function uchar(){
    // return random_int()
// }


//namespace luminance;

///
///@brief black-white stripes, row major luminance
///
function bwRowL($row, $col){
    //@arg {uint} >= 0, current $row pixel index
    //@arg {uint} >= 0, current column pixel index
    $rEven = ($row & 0x1) != 1;
        //cEven = ($col & 0x1) != 1;
        
    return $rEven ? 255 : 0;
}
///
///@brief black-white stripes, color major luminance
///
function bwColL($row, $col){
    $cEven = ($col & 0x1) != 1;
        
    return $cEven ? 255 : 0;
}
///
///@brief black-white checker, luminance
///
function bwCheckerL($row, $col){
    $rEven = ($row & 0x1) != 1;
    $cEven = ($col & 0x1) != 1;
        
    if($rEven){
        return $cEven ? 0 : 255;
    }
    else{
        return $cEven ? 255 : 0;
    }
}
//
// function wbRowL($row, $col){
    // //@arg {uint} >= 0, current $row pixel index
    // //@arg {uint} >= 0, current column pixel index
    // $rEven = ($row & 0x1) != 1;
        // //cEven = ($col & 0x1) != 1;
        
    // return $rEven ? 255 : 0;
// }
// function wbColL($row, $col){
    // $cEven = ($col & 0x1) != 1;
        
    // return $cEven ? 255 : 0;
// }

///
///@brief white-black checker, luminance
///
function wbCheckerL($row, $col){
    $rEven = ($row & 0x1) != 1;
    $cEven = ($col & 0x1) != 1;
        
    if($rEven){
        return $cEven ? 255 : 0;
    }
    else{
        return $cEven ? 0 : 255;
    }
}
///
///@brief solid middle grey(127) or the ASCII del character
///
function greyL($row, $col){
    return 127;
}
///
///@brief black-white col major, greater than (>), luminance
///@returns 255 when the column index is greater than the row index, otherwise 0
///
function bwColGTrowL($row, $col){
    return $col > $row ? 255 : 0;
}
///
///@brief black-white row major, greater than (>), luminance
///@returns 255 when the row index is greater than the column index, otherwise 0
///
function bwRowGTColL($row, $col){
    return $row > $col ? 255 : 0;
}

///
///@brief black-white col major, greater than or equal to (>=), luminance
///@returns 255 when the column index is greater than or equal to the row index, otherwise 0
///
function bwCol_gteq_rowL($row, $col){
    return $col >= $row ? 255 : 0;
}
///
///@brief black-white row major, greater than or equal to (>=), luminance
///@returns 255 when the row index is greater than or equal to the column index, otherwise 0
///
function bwRow_gteq_colL($row, $col){
    return $row >= $col ? 255 : 0;
}

///
///@brief black-white col major, less than (<), luminance
///@returns 255 when the column index is greater than or equal to the row index, otherwise 0
///
function bwCol_lt_rowL($row, $col){
    return $col < $row ? 255 : 0;
}
///
///@brief black-white row major, less than (<), luminance
///@returns 255 when the row index is greater than or equal to the column index, otherwise 0
///
function bwRow_lt_colL($row, $col){
    return $row < $col ? 255 : 0;
}

///
///@brief black-white col major, less than or equal to (<=), luminance
///@returns 255 when the column index is greater than or equal to the row index, otherwise 0
///
function bwCol_lteq_rowL($row, $col){
    return $col <= $row ? 255 : 0;
}
///
///@brief black-white row major, less than or equal to (<=), luminance
///@returns 255 when the row index is greater than or equal to the column index, otherwise 0
///
function bwRow_lteq_colL($row, $col){
    return $row <= $col ? 255 : 0;
}
// function wbColGTrowL($row, $col){
    // return $col > $row ? 0 : 255;
// }
//
//single grey scale value [0-255]
//namespace luminance;
//

///
///@brief clamp $val to [$min, $max]
///
function clamp($val, $min, $max) {
    return max($min, min($max, $val));
}

// function clampUC($val){ //=0
    // clamp($val,0,255);
// }
// function clampF($val){  //=0.0
    // clamp($val,0.0,1.0);
// }
// function clampNDC($val){
    // clamp($val,-1.0,1.0);
// }

//color function decorators

///
///@arg min lowest value
///@arg max highest value
///@brief decorator returning a function which returns min if row is greater than col
///
function _rowGTColL($min,$max){
    //
    $min = clamp($min,0,255);
    $max = clamp($max,0,255);
    //
    return function($row,$col){ //use($min, $max)
        return $row > $col ? $min : $max;
    };
}
///
///@arg min lowest value
///@arg max highest value
///@brief decorator returning a function which return min if col is greater than row
///
function _colGTRowL($min,$max){
    $min = clamp($min,0,255);
    $max = clamp($max,0,255);
    //
    return function($row,$col){
        return $col > $row ? $min : $max;
    };
}
///
///@brief white-black row major, greater than (>), luminance
///@returns 0 when the column index is greater than the row index, otherwise 255
///
function wbColGTrowL($row,$col){
    return $col > $row ? 0 : 255;
}
//namespace whiteblack
// $rowGTColL=_rowGTColL(0, 255);
// $colGTrowL=_colGTrowL(0,255);

///
///@brief white-black col major, greater than (>), luminance
///@returns 255 when the row index is greater than the column index, otherwise 0
///
function wbRowGTColL($row, $col){
    return $row > $col ? 0 : 255;
}

function lum5($row,$col){
    $r = $row / 5;
    $c = $col % 51;
    //
    return $r * 5 + $c;
}

//namespace px\color\luminance;

///
///@arg denom divisor representing an incremental step across the
///@arg row the row index of a texture
///@arg col the column index of a texture
///@brief generate a unsigned character value for a pixel at position [row,col] in a luminance texture for a given step (ie assign pixel value by incrementally counting by 1's,2's,4's, etc)
///@returns unsigned character value [0,255] else 0
///
function _luminance($denom = 1.0, $row = 0,$col = 0){
    $eps=1.0/255.0;
    
    if(abs($denom) >= $eps){
        //$inv = 1.0 / denom,
        //$m=255*$inv,
        $r = $row / $denom; //*$m;
        $c = $col % $denom; //$m;
            
        return ($r * $row + $c);// * $denom;
        //return ~~(($r + $c) * (255 / $denom));
    }
    return 0;
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increment of 3, ei, 0,3,6,9,etc
///
function three($row,$col){
    //generates a color in increments of 3 between [0,255] for any given pair of pixels [x,y]
    return _luminance(3,$row,$col);
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increment of 5, ei, 0,5,10,15,etc
///
function five($row,$col){
    //generates a color in increments of 5 between [0,255] for any given pair of pixels [x,y]
    return _luminance(5,$row,$col);
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increments of 15, ei, 0,15,30,45,etc
///
function fifteen($row,$col){
    //generates a color in increments of 15 between [0,255] for any given pair of pixels [x,y]
    return _luminance(15,$row,$col);
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increment of 17, ei, 0, 17,34,51,etc
///
function seventeen($row,$col){
    //generates a color in increments of 17 between [0,255] for any given pair of pixels [x,y]
    return _luminance(17,$row,$col);
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increment of 51, ei, 0,51,102,153,etc
///
function fiftyone($row,$col){
    //generates a color in increments of 51 between [0,255] for any given pair of pixels [x,y]
    return _luminance(51,$row,$col);
}
///
///@arg row X pixel value
///@arg col Y pixel value
///@brief returns greyscale values in increment of 85, ei, 0,85,170,255
///
function eightyfive($row,$col){
    //generates a color increments of 85 between [0,255] for any given pair of pixels [x,y]
    return _luminance(85,$row,$col);
}


//NOTE: THIS IS COOL!
// function lu(denom = 1.0, $row = 0,$col = 0){
    // $r = denom / ($row + 1),
        // c = denom % ($col + 1);
        
    // return ~~((r * $row + c * 5));
// }

function lu($denom = 1.0, $row = 0,$col = 0){
    //inv = 1.0 / denom,
        $r = ($row / $denom);
        $c = ($col % $denom);
        
    //return ~~((r * $row + c * 5) * 255); //NOTE:this is cool!
    return ~~(($r + $c) * (255 / $denom));
}

///
///@}
///

?>