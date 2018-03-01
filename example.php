<?php
require 'Map.php';

/** @var Map $map */
$map = new \Map('test.in');

$rides = $map->map;

$vehicles_results = array_fill(0, $map->F, ['n_rides' => 0 ] );
$vehicles_riding = array_fill(0, $map->F, null );
$terminated_rides = [];

function get_free_vehicle($riding_vehicles) {
  foreach($riding_vehicles as $vehicle => $ride) {
    if($ride === null) {
      return $vehicle;
    }
  }

  return null;
}

function count_free_vehicles($riding_vehicles) {
  return count(array_filter($riding_vehicles, function($item){ return $item === null; }));
}



for($i = 0; $i < $map->T; $i++ ) {
  for($j = 0; $j < count($rides); $j++) {
    //se la corsa è già stata fatta -> next
    if(in_array($j, $terminated_rides)) continue;
    //se la corsa non è stata assegnata
    $ride = null;
    if(false === ($ride = array_search($j, $vehicles_riding)))
    {
      // non ci sono auto disponibili
      if(!count_free_vehicles($vehicles_riding)) continue;
      $ride = $j;
      $vehicle_avbl = get_free_vehicle($vehicles_riding);
      $vehicles_riding[$vehicle_avbl] = $ride;
    }



  }

  die;
}

var_dump($vehicles_riding);