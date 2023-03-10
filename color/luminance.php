<?php
//namespace px\color\luminance;
//
function uchar(){
    //return value is a single integer clamped to [0,255]
    return rand(0,255);
}
//
function bwRowL($row, $col){
    //@arg {uint} >= 0, current $row pixel index
    //@arg {uint} >= 0, current column pixel index
    $rEven = ($row & 0x1) != 1;
        //cEven = ($col & 0x1) != 1;
        
    return $rEven ? 255 : 0;
}
function bwColL($row, $col){
    $cEven = ($col & 0x1) != 1;
        
    return $cEven ? 255 : 0;
}
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
function greyL($row, $col){
    return 127;
}
function bwColGTrowL($row, $col){
    return $col > $row ? 255 : 0;
}
function bwRowGTColL($row, $col){
    return $row > $col ? 255 : 0;
}

// function wbColGTrowL($row, $col){
    // return $col > $row ? 0 : 255;
// }
//
//single grey scale value [0-255]
//namespace luminance;
//
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

function _rowGTColL($min,$max){
    //
    $min = clamp($min,0,255);
    $max = clamp($max,0,255);
    
    return function($row,$col){
        return $row > $col ? $min : $max;
    };
}
function _colGTRowL($min,$max){
    $min = clamp($min,0,255);
    $max = clamp($max,0,255);
    
    return function($row,$col){
        return $col > $row ? $min : $max;
    };
}

function wbColGTrowL($row,$col){
    return $col > $row ? 0 : 255;
}
//namespace whiteblack
// $rowGTColL=_rowGTColL(0, 255);
// $colGTrowL=_colGTrowL(0,255);

function wbRowGTColL($row, $col){
    return $row > $col ? 0 : 255;
}

//namespace px\color\luminance;

// function lum5($row,$col){
    // $r = $row / 5;
    // $c = $col % 51;
        
    // return $r * 5 + $c;
// }
function _luminance($denom = 1.0, $row = 0,$col = 0){
    $eps=1.0/255.0;
    
    if(abs($denom) >= $eps){
        //$inv = 1.0 / denom,
        //$m=255*$inv,
        $r = $row / $denom; //*$m;
        $c = $col % $denom; //$m;
            
        return ($r * $row + $c);// * $denom;
        //return ~~(($r + $c) * (255 / $denom));    //cool pattern
    }
    return 0;
}

function three($row,$col){
    //generates a color increments of 3 between [0,255] for any given pair of pixels [x,y]
    return _luminance(3,$row,$col);
}
function five($row,$col){
    //generates a color increments of 5 between [0,255] for any given pair of pixels [x,y]
    return _luminance(5,$row,$col);
}
function fifteen($row,$col){
    //generates a color increments of 15 between [0,255] for any given pair of pixels [x,y]
    return _luminance(15,$row,$col);
}
function seventeen($row,$col){
    //generates a color increments of 17 between [0,255] for any given pair of pixels [x,y]
    return _luminance(17,$row,$col);
}
function fiftyone($row,$col){
    //generates a color increments of 51 between [0,255] for any given pair of pixels [x,y]
    return _luminance(51,$row,$col);
}
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


?>