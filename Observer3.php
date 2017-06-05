<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/5/2017
 * Time: 12:09 PM
 */


//crearemos una clase abstracta que heredan las clases observables
abstract class Observervable
{
    protected $observers;

    public function __construct()
    {
        $this->observers = array();
    }

    public function registrarObserver($observer)
    {
        if(in_array($observer, $this->observers)){
            $this->observers[] = $observer;
        }
    }

    public function deregistrarOberver($oberver)
    {
        if (in_array($oberver, $this->observers)){
            $key = array_search($oberver, $this->observers);
            unset($this->observers[$key]);
        }
    }

    abstract public function notificarObservers();

}

//y una interfaz que implementaran los observadores
interface Observer
{
    public function notificar($sender, $param);
}

class MiObservable extends Observervable
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notificarObservers()
    {
        foreach ($this->observers as $observer){
            $observer->notificar($this, $this->param);
        }
    }

    public function Event($texto)
    {
        $this->param = $texto;
        $this->notificarObservers();
    }
}

class Log implements Observer
{

    public function onChanged($sender, $args)
    {
        // TODO: Implement onChanged() method.
    }

    public function notificar($sender, $param)
    {
        echo get_class($sender)." envio {$param} a las ".date("h:i:d")."";
    }
}

class SalvarLog implements Obverser
{
    public function notificar($sender, $param)
    {
        echo "Guardando en BD $param enviado por ".get_class($sender)."... <br /><br />";
    }
}


$obj = new MiObservable();
$obj->registrarObserver(new Log());
$obj->registrarObserver(new SalvarLog());

$obj->Event("text1");
sleep(2);
$obj->Event("text2");