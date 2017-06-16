<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/16/2017
 * Time: 10:44 AM
 * EL patron observer nos permite crear observables para botificar de cualquier
 * cambio en su estado
 *
 * Objetivo: Se desea que cuando el administrador de la aplicación adicione un usuario,
 * a la vez de confirmarle dicha adición,
 * le presente la hora y la cantidad de usuarios que se modificó cuando se agregó dicho usuario.
 */
abstract class Observable
{
    protected $observers,

    function __construct()
    {
        $this->observers = array();
    }

    //registro delos objetos observables
    public function registrarObservables($observer)
    {
        $this->observers[] = $observer;
    }

    public function deregistrarObserver($observer)
    {
        if (in_array($observer, $this->observers)){
            $key = array_search($observer, $this->observers);

            unset($this->observers[$key]);
        }
    }

    abstract public function notificarObservers();
}

interface Observer
{
    public function notificar($sebder, $params);
}

class UserDB extends Observable
{
    private $conn;

    public function __construct()
    {
        $this->conn = "Conectado";
    }

    public function save($user)
    {
        $this->notificarObservers();
    }

    public function notificarObservers()
    {
       foreach ($this->observers as $observer){
           $observer->notificar($this, 1);
       }
    }
}

class NumeroUsuarios implements Observer
{
    private $numUsuarios;

    public function __construct($num){
        $this->numUsuarios = $num;
    }


    public function onChanged($sender, $args)
    {
        // TODO: Implement onChanged() method.
    }

    public function notificar($sebder, $params)
    {
        $this->numUsuarios = $this->numUsuarios+$params;

        echo get_class($sebder)." envio".$this->numUsuarios." a las "date('h:i:s', time())."<br />";
    }
}

$UserDB = new UserDB();
$UserDB->registrarObservables(new NumeroUsuarios(5));
$UserDB->save("asd");