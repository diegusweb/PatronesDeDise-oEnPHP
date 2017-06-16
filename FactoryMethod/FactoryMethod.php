<?php

/**
 * Created by PhpStorm.
 * User: DIego Rueda
 * Date: 6/1/2017
 * Time: 5:13 PM
 * el patrón factory method ofrece un método abstracto para que las subsclases
 * que lo utilicen puedan crear la instancia sin necesidad de conocerla
 * https://www.uno-de-piera.com/el-patron-factory-method-en-php/
 */

/**
 * Lo primero que debemos crear es una clase abstracta Customer
 * que contenga un método abstracto, ese método será el que haga efectivo el patrón factory method
 * */


abstract class FactoryMethod
{
    protected abstract function buildOrder($price);

    public function newOrder($price)
    {
        return $this->buildOrder($price)->paid();
    }
}


class CustomerCash extends FactoryMethod
{
    protected function buildOrder($price)
    {
        return new OrderCash($price);
    }
}


class CustomerSubscription extends FactoryMethod
{
    protected function buildOrder($price)
    {
        return new OrderSubcription($price);
    }
}


class OrderCash
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function paid()
    {
        return "Pago al contado efectuado correctamente: {$this->price}";
    }
}

class OrderSubcription
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function paid()
    {
        return "Pago a plazos efectuado correctamente: {$this->price}";
    }
}

//pago al contado
$customeCash = new CustomerCash();
echo $customeCash->newOrder(400);
echo "<br>";
//nueva suscripcion
$customeSubscription = new CustomerSubscription();
echo $customeSubscription->newOrder(60);