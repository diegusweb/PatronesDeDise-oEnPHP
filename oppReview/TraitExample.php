<?php
/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/22/2017
 * Time: 3:44 PM
 */

namespace Traits;


trait  Price{
    public function changePriceByDollar($price, $change)
    {
        return $price + $change;
    }
}

trait SpecialSell{
    public function annonunceSpecialSell()
    {
        return __CLASS__." on special sell";
    }
}

class Demo
{
    use Price;
    use SpecialSell;


}

$d = new Demo();
$d->changePriceByDollar(123, 12);
$d->annonunceSpecialSell();