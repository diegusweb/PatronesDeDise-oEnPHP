<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/5/2017
 * Time: 12:09 PM
 */


//crearemos una clase abstracta que heredan las clases observables
abstract class Observables
{
    protected $obsevers;

    function __construct()
    {
        $this->obsevers = array();
    }

    public function registrarObserver($oberver)
    {
        if(in_array($oberver, $this->obsevers)){
           $this->obsevers[] = $oberver;
        }
    }

    public function deregistrarObserver($observer)
    {
        if(in_array($observer, $this->obsevers)){
            $key = array_search($observer, $this->obsevers);
            unset($this->obsevers[$key]);
        }
    }

    abstract public function notificarObservers();
}

interface Observer
{
    public function notificar($sender, $params);
}

class MiObservable extends Observables
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Evento($texto)
    {
        $this->param = $texto;
        $this->notificarObservers();
    }

    public function notificarObservers()
    {
        foreach ($this->obsevers as $obsever) {
            $obsever->notificar($this, $this->param);
        }
    }
}


class SalvarLog implements Observer
{

    public function onChanged($sender, $args)
    {
        // TODO: Implement onChanged() method.
    }

    public function notificar($sebder, $params)
    {
        echo " Guardando en BD $params a las ".date('h:i:s', time())."<br />";
    }
}

class Log implements Observer
{

    public function onChanged($sender, $args)
    {
        // TODO: Implement onChanged() method.
    }

    public function notificar($sebder, $params)
    {
        echo get_class($sebder)." envio $params a las ".date('h:i:s', time())."<br />";
    }
}


$bbj = new MiObservable();
$obj->registrarObserver(new Log());
$obj->registrarObercer(new SalvarLog());

$bbj->Evento("test 1");
sleep(1);
$bbj->Evento("test 2");

$bbj->deregistrarObserver(new SalvarLog());
$obj->Evemto("test 3");