<?php

class Map
{
    private $R;
    private $C;
    private $F;
    private $N;
    private $B;
    private $T;
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



    private function printMap() {
        echo 'R ' . $this->R . '&nbsp<br><br>';
        echo 'C ' . $this->C . '&nbsp<br><br>';
        echo 'F ' . $this->F . '&nbsp<br><br>';
        echo 'N ' . $this->N . '&nbsp<br><br>';
        echo 'B ' . $this->B . '&nbsp<br><br>';
        echo 'T ' . $this->T . '&nbsp<br><br>';
        for ($i = 0; $i < count($this->map); $i++) {
            echo implode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $this->map[$i]) . "<br><br>";
        }
    }

    public function calculateDistance($a, $b, $x, $y){
        return fmod(($a-$x)) + fmod($b-$y);
    }
}