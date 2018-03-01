<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Map.php';

$map = new Map('test.in');

$ride = $map->getRideByPosition(0);
$coordinates = $map->getCoordinates($ride);
print_r($coordinates);
