<?php

/**
 * Created by PhpStorm.
 * User: Diego Rueda
 * Date: 6/1/2017
 * Time: 3:56 PM
 */
class SingletonDBConnection
{
    //contenedor de la instancia del singleton
    static private $instances;

    //un constructor privado ecita la creacion d eun nuevo objeto
    private function __construct()
    {

    }

    //metodo del singleton que debe ser static
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            $myClass = __CLASS__;
            self::$instances = new $myClass;
        }

        return self::$instances;
    }

    public function query($data)
    {
        return null;
    }

    public function connectDB($data)
    {
        return null;
    }

    public function __wakeup(){
        throw new Exception('Class  '.__CLASS__ . 'cannot be unserialized');
    }

    public function __sleep(){
        throw new Exception('Class  '.__CLASS__ . 'cannot be serialized');
    }

    //evita que el objeto se pueda clonar
    public function __clone(){
        throw new Exception('Class  '.__CLASS__ . 'cannot be cloned');
    }
}

//ejemplo de usp correcto
$test = SingletonDBConnection::getInstance();
$tes->connectDB($data);

//si intentamos insranciar nuevamente nos dara un error
$test2 = SingletonDBConnection::getInstance();
$test2->connectDB($data);

//si intentamos clonar la instancia $test, el metodo __clone que pusimos evitar que podamos
//crear una nueva instancia

$clonTest1 = clone $test;
$clonTest1->connectDB($data);
