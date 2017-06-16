<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/16/2017
 * Time: 5:12 PM
 */
class ConnecDBSample
{
    private static $instance;
    private $conn;

    private function  __construct()
    {
        $this->conn = "DB conectado";
    }

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new ConnecDBSample();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$instace = ConnecDBSample::getInstance();
$conn = $instace->getConnection();
var_dump($conn);