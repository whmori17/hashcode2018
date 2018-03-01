<?php
require 'Map.php';

//$R = 3;
//$C = 4;
//$V = 2;
//$N = 3;
//$B = 2;
//$T = 10;
//
//
//$rides = [
//  [0,0,1,3,2,9],
//  [1,2,1,0,0,9],
//  [2,0,2,2,0,9]
//];
//
//$vehicles = array_fill(0, $V, ['n_rides' => 0 ] );
//$terminated_rides = [];
//
//for($i = 0; $i < $T; $i++ ) {
//  for($j = 0; $j < count($rides); $j++) {
//    if(in_array($j, $terminated_rides)) continue;
//
//
//
//  }
//}

$map = (new \Map('test.in'))->map;



var_dump($map);