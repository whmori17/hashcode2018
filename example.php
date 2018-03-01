<?php
require 'Map.php';

/** @var Map $map */
$file = "b_should_be_easy";

$map = new \Map('dataset/'.$file.'.in');

$rides = $map->map;

$vehicles_results = array_fill(0, $map->F, ['n_rides' => 0 ,'rides' => []] );
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

function search_ride_assigned($ride, $vehicles_riding) {
  foreach($vehicles_riding as $vh => $vr) {
    if($vr[0] === $ride) return $vh;
  }

  return false;
}



for($i = 0; $i < $map->T; $i++ ) {
  for($ride = 0; $ride < count($rides); $ride++) {
    //se la corsa è già stata fatta -> next
    if(in_array($ride, $terminated_rides)) {continue;}
    //se la corsa non è stata assegnata
    if(false === ($vh = search_ride_assigned($ride, $vehicles_riding)))
    {
      // non ci sono auto disponibili
      if(!count_free_vehicles($vehicles_riding)) continue;

      $vehicle_avbl = $vh = get_free_vehicle($vehicles_riding);
      $vehicles_riding[$vehicle_avbl] = [$ride, $map->calculateDistance($ride) + $rides[$ride][4]];
    }

    $vehicles_riding[$vh][1]--;
    if($vehicles_riding[$vh][1] === 0) {
      $vehicles_results[$vh]['n_rides']++;
      $vehicles_results[$vh]['rides'][] = $ride;
      $terminated_rides[] = $ride;
      $vehicles_riding[$vh] = null;
    }
  }
}

foreach ($vehicles_results as $rides) {
  file_put_contents('output/'.$file.'.out',$rides['n_rides']." ".implode(' ', $rides['rides']).PHP_EOL,FILE_APPEND);
}
