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
        // TODO: Implement buildOrder() method.
        return new OrderCash($price);
    }
}

class CustomerSubscription extends FactoryMethod
{
    protected function buildOrder($price)
    {
        // TODO: Implement buildOrder() method.
        return new CustomerCash($price);
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
        return "Pago al conrado a efectuado correctam,ente";
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
        return "pago en suscription";
    }
}

//pago al contado
$customeCash = new CustomerCash();
echo $customeCash->newOrder(400);

//nueva suscripcion
$customeSubscription = new CustomerSubscription();
$customeSubscription->newOrder(60);