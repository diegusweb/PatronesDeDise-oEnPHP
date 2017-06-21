<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 12:30 PM
 */
namespace MagicMethodsAndConstants;

class Car
{
    private $model = '';

    public function __construct($model=null)
    {
        if($model){
            $this->model = $model;
        }
    }

    public function getCarModel()
    {
        ///we use the __class__ magic constant
        // in order to get the class name
        return "the ".__CLASS__." model is:".$this->model;
    }
}

$car1 = new Car('Toyota');

echo $car1->getCarModel();  //the Car model is Toyota

//Other magic constants that may be of help are:

//__LINE__ to get the line number in which the constant is used.
//__FILE__ to get the full path or the filename in which the constant is used.
//__METHOD__ to get the name of the method in which the constant is used.HOD__ to get the name of the method in which the constant is used.