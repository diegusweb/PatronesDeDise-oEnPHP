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

//example use
$test = SingletonDBConnection::getInstance();
$tes->connectDB($data);
