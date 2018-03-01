<?php

class Map
{
    public $R;
    public $C;
    public $F;
    public $N;
    public $B;
    public $T;
    public $map;

    /**
     * Map constructor.
     */
    public function __construct($nameFile)
    {
        $file = explode("\n", file_get_contents($nameFile));
        $this->map = [];
        foreach ($file as $i => $line)
        {
          $params = explode(' ', $line);
          if($i === 0) {
            $this->R = $params[0];
            $this->C = $params[1];
            $this->F = $params[2];
            $this->N = $params[3];
            $this->B = $params[4];
            $this->T = $params[5];
          }
          else {
            $this->map[] = $params;
          }
        }
    }

    public function calculateDistance($a, $b, $x, $y){
        return fmod(($a-$x)) + fmod($b-$y);
    }

    public function getRideByPosition($position){
        return $this->map[$position];
    }

    public function getCoordinates($ride){
        $rideCoordinates = [];
        for($i = 0; $i < count($ride);$i++){
            $rideCoordinates[] = [$ride[$i],$ride[$i+1]];
            $i++;
        }
        return $rideCoordinates;
    }
}