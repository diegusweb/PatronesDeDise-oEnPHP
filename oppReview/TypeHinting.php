<?php
/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 5:00 PM
 */

namespace TypeHinting;


abstract class Car
{
    protected $model;
    protected $height;

    abstract public function calcTankVolume();
}


class Bmw extends Car
{
    protected $rib;

    public function __construct($model, $rib, $height)
    {
        $this->model = $model;
        $this->rib = $rib;
        $this->height = $height;
    }

    public function calcTankVolume()
    {
        return $this->rib * $this->rib * $this->height;
    }

}

class Mercedes extends Car
{
    protected $radius;

    public function __construct($model, $radius, $height)
    {
        $this->model = $model;
        $this->radius = $radius;
        $this->height = $height;
    }

    public function calcTankVolume()
    {
        return $this -> radius * $this -> radius * pi() * $this -> height;
    }
}

//test
function calcTankprice(Car $car, $pricePerGalon)
{
    return $car->calcTankVolume() * 0.0043290 * $pricePerGalon . "$";
}

$bmw1 = new Bmw('62182791', 14, 21);
echo calcTankprice($bmw1, 4);

$mercedes1 = new Mercedes('12189796', 7, 28);
echo calcTankprice($mercedes1,4);
