<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/5/2017
 * Time: 3:06 PM
 */
class Singleton
{
    private static $singleInstance;

    private function __construct()
    {
        if(self::$singleInstance){
            self::$singleInstance = new Singleton();
        }

        return self::$singleInstance;
    }

    public function Metodo()
    {
        var_dump(self::$singleInstance);
    }

}

$miprueva = Singleton::getInstance();
$miprueva->Metodo();