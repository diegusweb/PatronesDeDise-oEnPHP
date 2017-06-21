<?php
/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 3:31 PM
 */

namespace AbstractClassesAndMethod;


abstract class Car
{
    protected $tankVolume;

    public function setTankVolume($volume)
    {
        $this->tankVolume = $volume;
    }

    abstract public function calcNumMilesOnFullTank();

}

class Honda extends Car
{

    public function calcNumMilesOnFullTank()
    {
        $miles = $this->tankVolume*30;
        return $miles;
    }
}

class Toyota extends Car
{

    public function calcNumMilesOnFullTank()
    {
        $miles = $this->tankVolume*33;
        return $miles;
    }

    public function getColor()
    {
        return 'azul';
    }
}

$toyota1 = new Toyota();
$toyota1->setTankVolume(10);

echo $toyota1->calcNumMilesOnFullTank();
echo $toyota1->getColor();