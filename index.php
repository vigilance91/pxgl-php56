<?php
//
//DISCORD LINK(share to allow access to server)
//https://discord.gg/QhTkTEG
//
//August 1st zoom meeting Yaa Otchere-LLC
//
//graphic programmer with 
//private pilots license at 17
//
//career 5 years
//worked at 2 indie studios
//taught at triOS
//
//driven, dedicated, pragmatic
//experience working with
    //C++,
    //Python,
    //Objective-C/Swift
    //C#/unity
    //PHP/html/js/css
    //Ethereum/Solidity
//
//worked with teams up to 12
//
//repos
//published integer sequence library for python
//developed on markup-langauge and par
//Py++36 library + embedded application
//
function ifndef($tkn, $val){
    if(!defined($tkn)){
        //echo 'ROOT_DIR not defined\n';
        define($tkn, $val);
    }
    //echo "token {$tkn} already defined\n';
}
//
//Constants
//
ifndef('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
ifndef('PHP_DIR', ROOT_DIR . "/php");
ifndef('IMG_DIR', PHP_DIR . '/crypto/image/');
//
call_user_func(function(){
    $d=dirname(__FILE__);
    
    foreach([
        ROOT_DIR . "/php/server",
        //"$d/image",
        "$d/create"
    ] as $p){
        require_once "$p.php";
    }
});
//require
//require_once ROOT_DIR . "/php/regex/meta.php";    //strip.php";
//
use function serv\requestURI as getURI;
use function serv\queryString as _queryStr;
use function serv\scriptName as _scriptName;
use function explode as xpl;
use function str_replace as _replace;
use function array_slice as _slice;
//use function json_encode as _encode;
use function ps\create\greyScale as _createGreyScale;
//
call_user_func(function(){
    //require_once 'pageIncludes.php';
    $baseURI=getURI();
    $name=_scriptName();
    $name=_replace('index.php','',$name);
    // echo $name;
    // echo '<br>';
    // echo $baseURI;
    // echo '<br>';
    $baseURI= _replace($name,'',$baseURI);
    // //$qstr=_queryStr();
    // //echo $qstr;
    // //echo '<br>';
    // echo $baseURI;
    // echo '<br>';
    //$base=_slice(xpl());
    $routes=xpl('?',$baseURI)[0];  //separate routes from get variables, will always be element [0], ignore get params
    
    //$routes=xpl('-',$routes);  //split routes
    $use=[
        'routes'=>xpl('-',$routes),
        'dir'=>dirname(__FILE__)
    ];
    //echo json_encode($routes);
    //exit();
    // foreach($routes as $r){
        // if(trim($route) != ''){
            
        // }
    // }

    //if($routes[0]==''){
        //require_once '404.php';
    //}
    //

    // function ro($paths){
        //return function(){
            // foreach($paths as $p){
                // require_once "${$p}.php";
            // }
        //};
    // }
    $contracts=[
        // '/'=>function(){
            // require_once 'home.php';
        // },
        // 'about'=>function(){
            // require_once 'about.php';
        // },
        // 'contact'=>function(){
            // require_once 'contact.php';
        // }
        'help'=>function()use($use){
            //display help information for using this web API
            $d=$use['dir'];
            require_once "$d/help.php";
        },
        //random textures with separate width and height
        //programatic lumincance textures
        // 'lum'=>function()use($use){
        // },
        
        //procedurally generated greyscale images (non-random)
        'greyscale'=>function()use($use){
            //$w=1;
            //$h=1;
            // if(!isset($use['routes'][2])){
                // exit('404');
            // }
            //$w=intval($use['routes'][2]) or null;
            // if(!isset($use['routes'][3])){
                // exit('404');
            // }
            //
            //$h=intval($use['routes'][3]) or null;
            //
            _createGreyScale(Function($x,$y){
                return uchar();
            });
            //greyscale-fill[-w[-h[-l]]]            //fill texture with single color l
            //greyscale-palette[-w[-h[-pal]]]       //fill texture by sequentially sampling color palette pal
            //
            //Random texture generation(variable width and height)
            //
            //greyscale-rand-fill[-w[-h]]           //fill texture with single random color [0,255]
            //greyscale-rand-palette[-w[-h[-pal]]]  //fill texture by randomly sampling color palette pal
            //
            //greyscale-rand-cm[-w[-h]]             //fill texture with single random color for each column
            //greyscale-rand-rm[-w[-h]]             //fill texture with single random color for each row
            //
            //
            //checker boards
            //
            //greyscale-bw[-w[-h]]           //create WxH texture filled with checke board pattern starting with black, alternating each pixel
            //greyscale-wb[-w[-h]]           //create WxH texture filled with checke board pattern starting with black, alternating each pixel
            //
            //logical operators
            //
            //greyscale-bw-eq[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is equal to (==) the column index, creates a diagonal line
            //greyscale-wb-eq[-w[-h]]           //create WxH texture filled with checke board pattern starting with white if the row index is equal to (==) the column index
            //
            //greyscale-bw-neq[-w[-h]]           //create WxH texture filled with black if the row index is NOT equal to (!=) the column index, else white, inverse of eq
            //greyscale-wb-neq[-w[-h]]           //create WxH texture filled with white if the row index is NOT equal to (!=) the column index, else black, inverse of eq
            //
            //greyscale-bw-rm-lt[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is less than (<) the column index
            //greyscale-bw-rm-gt[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is greater than (>) the column index
            //greyscale-bw-rm-lteq[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is less than or equal to (<=) the column index
            //greyscale-bw-rm-gteq[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is greater than or equal to (>=) the column index
            //
            //greyscale-bw-cm-lt[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is less than (<) the column index
            //greyscale-bw-cm-gt[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is greater than (>) the column index
            //greyscale-bw-cm-lteq[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is less than or equal to (<=) the column index
            //greyscale-bw-cm-gteq[-w[-h]]           //create WxH texture filled with checke board pattern starting with black if the row index is greater than or equal to (>=) the column index
            //
            //incremental colour scales
            //
            //lum-three
            //lum-five
            //lum-fifteen
            //lum-seventeen
            //lum-fiftyone
            //lum-eightyfive
            
            //
            //Square textures where width==height
            //
            //greyscale-fill-square[-size[-l]]            //fill texture with single color l
            //greyscale-palette-square[-size[-pal]]       //fill texture by sequentially sampling color palette pal
            //
            //Random texture generation
            //
            //greyscale-rand-fill-square[-size]           //fill texture with single random color [0,255]
            //greyscale-rand-palette-square[-size[-pal]]  //fill texture by randomly sampling color palette pal
            //
            //greyscale-rand-cm-square[-size]             //fill texture with single random color for each column
            //greyscale-rand-rm-square[-size]             //fill texture with single random color for each row
            //
            //checker boards
            //
            //greyscale-bw-square[-size]           //create SxS texture filled with checke board pattern starting with black, alternating each pixel
            //greyscale-wb-square[-size]           //create SxS texture filled with checke board pattern starting with black, alternating each pixel
            //
            //logical operators
            //
            //greyscale-bw-eq-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is equal to (==) the column index, creates a diagonal line
            //greyscale-wb-eq-square[-size]           //create SxS texture filled with checke board pattern starting with white if the row index is equal to (==) the column index
            //
            //greyscale-bw-neq-square[-size]           //create SxS texture filled with black if the row index is NOT equal to (!=) the column index, else white, inverse of eq
            //greyscale-wb-neq-square[-size]           //create SxS texture filled with white if the row index is NOT equal to (!=) the column index, else black, inverse of eq
            //
            //greyscale-bw-rm-lt-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is less than (<) the column index
            //greyscale-bw-rm-gt-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is greater than (>) the column index
            //greyscale-bw-rm-lteq-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is less than or equal to (<=) the column index
            //greyscale-bw-rm-gteq-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is greater than or equal to (>=) the column index
            //
            //greyscale-bw-cm-lt-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is less than (<) the column index
            //greyscale-bw-cm-gt-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is greater than (>) the column index
            //greyscale-bw-cm-lteq-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is less than or equal to (<=) the column index
            //greyscale-bw-cm-gteq-square[-size]           //create SxS texture filled with checke board pattern starting with black if the row index is greater than or equal to (>=) the column index
            //
            //incremental colour scales
            //
            //greyscale-three-cm-square[-size]
            //lum-five
            //lum-fifteen
            //lum-seventeen
            //lum-fiftyone
            //lum-eightyfive
        },
        //rgb
        //rgba
        
        //randomly generated textures
        'rand'=>function()use($use){
            //echo json_encode($routes);
            //url rand-fill[-w[-h[-r-[g[-b]]]]]
            //url rand-palette[-w[-h[-pal]]]]
            //url rand-rgb[-w[-h[-r[-g[-b]]]]]
            //
            //global $routes;
            if(!isset($use['routes'][1])){
                exit('404');
            }
            
            $pages=[
                //special use case where width and height are the same, only one dimension variable sent
                
                //create greyscale/luminance images
                //create images with alpha
                'rgba'=>function()use($use){
                    $d=$use['dir'];
                    require_once "$d/rgba.php";
                    //ps\image\rand\rgba();
                    ps\create\rgba\square(function($x,$y){
                        return [
                            uchar(),
                            0,//uchar(),
                            0,//uchar(),
                            uchar()
                        ];
                    });
                    return;
                },
                'square'=>function()use($use){
                    //fill
                    //palette
                    //
                    //create a square png image filled with randomly generated colors
                    $d=$use['dir'];
                    //require_once '../random/rand.php';
                    
                    // function randGreyscale()
                    // {
                        // call_user_func('ps\\image\\createProcGreyscale',
                        // function($x,$y){
                            // return randColor24ui();
                        // });
                    // }
                    // function randGreyscaleSquare()
                    // {
                        // call_user_func('ps\\image\\createProcGreyscaleSquare',
                        // function($x,$y){
                            // return randColor24ui();
                        // });
                    // }
                    
                    require_once "$d/random/rand.php";
                    //
                    if(!isset($use['routes'][2])){
                        //echo 'route[2] does not exist';
                        //no image size set, defaults to get param s,
                        //otherwise defaults to 32 pixels
                        ps\image\rand\rgbSquareNorm();
                        return;
                    }
                    $s=$use['routes'][2];
                    
                    // if(!(ps\is\uint($s))){
                        // exit('404, ' . __FUNCTION__ . ', image dimension route at index 2 expects only an unsigned integer');
                    // }
                    $s=intval($s);
                    //ps\is\uint ensures $s will be at least 0 or greater
                    if($s<IMG_DIMENSION_MIN){
                        $s=IMG_DIMENSION_MIN;
                    }
                    else if($s>IMG_DIMENSION_MAX){
                        $s=IMG_DIMENSION_MAX;
                    }
                    //
                    //exit('stuff');
                    //require_once "$d/square/rand.php";
                    ps\image\rand\rgbSquareNorm($s);
                    //use function ps\image\rand\rgbSquareNorm as rgbSquareNorm;
                    //rgbSquareNorm($s);
                },
                'fill'=>function()use($use){
                    //global $routes;
                    //echo json_encode($routes);
                    //echo '<p>yeah routing!</p>';
                    //$d=$use->dir;
                    $d=$use['dir'];
                    require_once "$d/random/fill.php";
                    //
                    // $w=$routes[2];
                    // $h=$routes[3];
                    
                    // $r=$routes[4];
                    // $g=$routes[5];
                    // $b=$routes[6];
                    
                    //if(!isset($))
                    ////rFill($r,$g);
                    ////rFill($r);
                    rFill();
                    //rFill($r,$g,$b);
                },
                //palette=>function()use($routes){
                //},
                'rgb'=>function()use($use){
                    echo 'woot!';
                }
            ];
            
            $p=$use['routes'][1];  //page
            
            if(!isset($pages[$p])){
                //404 page not found
                //exit();
            }
            $cb=$pages[$p];
            //
            if(!is_callable($cb)){
                exit('error, page callback is not callable!');
            }
            //call_user_func($cb);
            $cb();
        }
        // 'square'=>function()use($use){
            // //echo json_encode($routes);
            // //url rand-fill[-w[-h[-r-[g[-b]]]]]
            // //url rand-palette[-w[-h[-pal]]]]
            // //url rand-rgb[-w[-h[-r[-g[-b]]]]]
            // //
            // //global $routes;
            // if(!isset($use['routes'][1])){
                // exit('404');
            // }
            
            // $pages=[
                // //'rand'=>function(){}
                // 'fill'=>function()use($use){
                    // //global $routes;
                    // //echo json_encode($routes);
                    // //echo '<p>yeah routing!</p>';
                    // //$d=$use->dir;
                    // $d=$use['dir'];
                    // require_once "$d/random/fill.php";
                    // //
                    // // $w=$routes[2];
                    // // $h=$routes[3];
                    
                    // // $r=$routes[4];
                    // // $g=$routes[5];
                    // // $b=$routes[6];
                    
                    // //if(!isset($))
                    // ////rFill($r,$g);
                    // ////rFill($r);
                    // rFill();
                    // //rFill($r,$g,$b);
                // },
                // //palette=>function()use($routes){
                // //},
                // 'rgb'=>function()use($use){
                    // echo 'woot!';
                // }
            // ];
            
            // $p=$use['routes'][1];  //page
            
            // if(!isset($pages[$p])){
                // //404 page not found
                // //exit();
            // }
            // $cb=$pages[$p];
            // //
            // if(!is_callable($cb)){
                // exit('error, page callback is not callable!');
            // }
            // //call_user_func($cb);
            // $cb();
        // }
    ];

    $p=$use['routes'][0];

    if(!isset($contracts[$p])){
        //404 page not found
        exit('404 page not found');
    }

    $cb=$contracts[$p];
    
    if(!is_callable($cb)){
        exit('error, contract callback is not callable!');
    }
    
    $cb();
    
    exit();
});
//
?>