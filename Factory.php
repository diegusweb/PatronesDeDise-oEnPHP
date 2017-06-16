<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/16/2017
 * Time: 4:34 PM
 * Una clase simple que crea el objeto y si deseo utilizar el objeto
 */
class Automobile
{
    private $bikerMaker;
    private $bikerModel;

    public function __construct($make, $model)
    {
        $this->bikerMaker = $make;
        $this->bikerModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->bikerMaker." ".$this->bikerModel;
    }
}

class AutomobilFactory
{
    public static function create($make, $model){
        return new Automobile($make, $model);
    }
}

$pulsar = AutomobilFactory::create("km","Pulsar");
print_r($pulsar->getMakeAndModel());