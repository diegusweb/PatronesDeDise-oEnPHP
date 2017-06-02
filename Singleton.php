<?php

/**
 * Created by PhpStorm.
 * User: Diego Rueda
 * Date: 6/1/2017
 * Time: 3:56 PM
 * Instancia unica esta diseñado para restringir la creacion de
 * objetos de una clase, en si solo permite la instancia de una clase
 */
class SingletonDBConnection
{
    //contenedor de la instancia del singleton
    static private $instances = null;

    //un constructor privado ecita la creacion d eun nuevo objeto
    private function __construct()
    {

    }

    //metodo del singleton que debe ser static
    public static function getInstance()
    {
        $d =0;
        if(self::$instances == null){
            $d++;
            $myClass = __CLASS__;
            self::$instances = new $myClass;
           echo $d."<br>";
        }

        return self::$instances;
    }

    public function query($data)
    {
        return "qury";
    }

    public function connectDB($data)
    {
        return "connectDB";
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


$data = null;
//ejemplo de usp correcto
$test = SingletonDBConnection::getInstance();
echo $test->connectDB($data);

//si intentamos insranciar nuevamente nos dara un error
//$test2 = SingletonDBConnection::getInstance();
//echo $test2->connectDB($data);

//si intentamos clonar la instancia $test, el metodo __clone que pusimos evitar que podamos
//crear una nueva instancia

//$clonTest1 = clone $test;
//$clonTest1->connectDB($data);
