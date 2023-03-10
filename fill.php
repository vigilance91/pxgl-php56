<?php
///
///@file fill.php
///@brief generate a RGB png texture filled with color, {r,g,b}or{c=#RRGGBB} from server upon url request
///
require_once 'image.php';
//
use function ps\image\createFill as pngFill;
//
pngFill();
?>