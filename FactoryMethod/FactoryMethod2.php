<?php

/**
 * Created by PhpStorm.
 * User: DIego
 * Date: 6/1/2017
 * Time: 11:12 PM
 * Las clases de las cuales querremos que la clase factory nos devuelva la instancia,
 * deberán ser una implementación de una interface o una extensión de una clase abstracta,
 * para que podamos llamar a los mismos métodos, sea cual sea la instancia que nos devuelva el objeto
 */


interface FactoryMethod2
{
    public function quienSoy();
}

class Coche implements FactoryMethod2
{

    public function quienSoy()
    {
        echo "Son un coche";
    }
}

class Bicicleta implements FactoryMethod2
{

    public function quienSoy()
    {
        echo "Soy una bicicleta";
    }
}

class Moto implements FactoryMethod2
{

    public function quienSoy()
    {
        echo "Son una moto";
    }
}

//Pongamos que queremos obtener una clase u otra en función

class VehiculoFactory
{
    public static function getVehiculoInstance($price)
    {
        if($price == 'caro'){
            return new Coche();
        }else if($price == 'asequible'){
            return new Moto();
        }else if ($price == 'barato'){
            return new Bicicleta();
        }else{
            throw new InvalidArgumentException('Precio no valido');
        }
    }
}

//Llamando

$vehiculo = VehiculoFactory::getVehiculoInstance('barato');
$vehiculo->quienSoy();


//este patron es aplicable cuando vayamos a querer obtener una instancia
//mas de una vez en nuestro codigo