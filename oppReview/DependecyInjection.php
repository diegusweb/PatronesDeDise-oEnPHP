<?php
/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/22/2017
 * Time: 4:24 PM
 */

namespace deIj;

//we created an  interface class for our test
interface Driver
{
    public function sayYourName($name);

}

class HumanDriver implements Driver
{
    public function sayYourName($name)
    {
        return $name;
    }
}

//in the construct we put the clas for inject
class Car
{
    protected $driver;

    public function __construct(Drive $drive)
    {
        $this->driver = $drive;
    }

    public function getDriver()
    {
        return $this->driver;
    }
}

$humanDriver = new HumanDriver();

$car = new Car($humanDriver);
echo $car->getDriver()->sayYourName("demo");
