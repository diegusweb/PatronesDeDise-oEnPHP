<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/5/2017
 * Time: 4:01 PM
 * Nos permite quitar, modificar o leminar responsabilidades a un objrto
 * dinamicamente, en si nos ayuda conservar e principio de Open/close
 * abierto par ala extension pero cerrado para la modicicacion
 */

class Arepa
{
    protected $basePrice = 100;

    public function getPrice()
    {
        return $this->basePrice;
    }
}

abstract class ArepaDecorator
{
    protected $price;
    protected $arepa;

    public function __construct($arepa)
    {
        $this->arepa = $arepa;
    }

    public function getPrice()
    {
        return $this->arepa-$this->getPrice() + $this->price;
    }
}


class withCheese extends ArepaDecorator
{
    protected $price = 50;
}

class withMEat extends ArepaDecorator
{
    protected $price = 90;
}

class withFish extends ArepaDecorator
{
    protected $price = 120;
}

$arepa = new Arepa();
echo "una arepa solo cuesta".$arepa->getPrice()." pesos";

$arepa = new withCheese(new Arepa());
echo "una arepa con queso solo cuesta".$arepa->getPrice()." pesos";

$arepa = new withMEat(new Arepa());
echo "una arepa con carne solo cuesta".$arepa->getPrice()." pesos";

$arepa = new withFish(new withCheese(new withMeat(new Arepa())));
echo 'Una arepa con pescado, carne y queso cuesta ' . $arepa->getPrice() . ' pesos' . PHP_EOL;
