<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 11:13 AM
 * As we should like our code to look elegant, we will chain the methods and properties
 * In order to perform the chaining the methods should return the $this is keyword
 */
class Car
{
    public $tank;

    public function fill($float)
    {
        $this->tank += $float;

        return $this;
    }

    public function ride($float)
    {
        $miles = $float;
        $gallons = $miles/50;
        $this->tank -= $gallons;

        return $this;
    }
}


$test = new Car();
$tank = $test->fill(10)->ride(40)->tank;

echo "The number o fgallons left in the tank: ".$tank;


class User
{
    public $firstName;
    public $lastName;

    public function hello()
    {
        return "hello, ".$this->firstName;
    }

    public function register()
    {
        echo $this->firstName." ".$this->lastName." registered";
        return $this;
    }

    public function email()
    {
        echo " emailed";
    }
}

$per = new User();
$per->firstName = "Diego";
$per->lastName = "Rueda";

//Chain methods email() to register()
$per->register()->email();