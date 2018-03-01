<?php

class Pizza
{
    private $R;
    private $C;
    private $L;
    private $H;
    private $slices = [];
    private $pizza = [];

    /**
     * Pizza constructor.
     */
    public function __construct($nameFile)
    {
        $file = explode("\n", file_get_contents($nameFile));

        $params = explode(' ', $file[0]);
        $this->R = $params[0];
        $this->C = $params[1];
        $this->L = $params[2];
        $this->H = $params[3];

        $this->pizza = $this->getPizzaArray($file, $this->R);
    }

    private function getPizzaArray(Array $file, int $R) {
        $pizza = [];

        for ($i = 1; $i < $R+1; $i++) {
            $pizza[$i-1] = str_split($file[$i]);
        }

        return $pizza;
    }

    private function printPizza(Array $pizza) {
        for ($i = 0; $i < count($pizza); $i++) {
            echo implode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $pizza[$i]) . "<br><br>";
        }
    }
}