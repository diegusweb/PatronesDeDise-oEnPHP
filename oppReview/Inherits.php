<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 2:53 PM
 */
namespace Inherits;

class Car
{
    private $model;

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function hello()
    {
        return "beep I am ".$this->model;
    }
}

class SportsCar extends Car
{
    private $style = 'fast and furious';

    public function driveWithStyle()
    {
        return 'Drive a '.$this->getModel()." ".$this->style;
    }
}

$sposr = new SportsCar();
$sposr->setModel("Nissan");
echo $sposr->driveWithStyle();


