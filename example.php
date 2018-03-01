<?php
require 'Map.php';

/** @var Map $map */
$map = new \Map('test.in');

$rides = $map->map;

$vehicles = array_fill(0, $map->F, ['n_rides' => 0 ] );
$terminated_rides = [];

for($i = 0; $i < $map->T; $i++ ) {
  for($j = 0; $j < count($rides); $j++) {
    if(in_array($j, $terminated_rides)) continue;


  }
}




var_dump($vehicles);