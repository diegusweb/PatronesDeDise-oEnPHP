<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/5/2017
 * Time: 3:23 PM
 * http://www.davidrojas.net/index.php/desarrollo-web/videotutorial-patrones-de-diseno-en-php-chain-of-command/
 */


//primero crearemosuna interfaz que implelementaran losobjetos
// receptores
interface ICommand
{
    public function onCommand($comando, $args);

}

//clase emisora que sera la encargada de mantener
// la lista de la insrancias de los objeros receptores
//ypasarñes las peticiones a estos

class ChainOfCommand
{
    private $_commands = array();

    public function addCommand($cmd)
    {
        $this->_commands[] = $cmd;
    }

    public function runCommand($comando, $args)
    {
        foreach ($this->_commands as $cmd){
            if($cmd->onCommand($comando, $args));
        }
    }
}

//creasmos las clases delos objetos receptores
// que implementar de la interfaz ICommand
class SMSCommanad implements ICommand
{
    public function onCommand($comando, $args)
    {
        if($comando!='NotifyUser' || $args['metodo']!='sms')
            return false;

        echo("SMSCommand ejecutando $comando. Notificando usuario ".$args['user']. " via SMS.\n");
        return true;
    }
}

class MainlCommand implements ICommand
{

    public function onCommand($comando, $args)
    {
        if($comando!='NotifyUser' || $args['metodo']!='mail')
            return false;

        echo("SMSCommand ejecutando $comando. Notificando usuario ".$args['user']. " via Email.\n");
        return true;
    }
}

$c = new ChainOfCommand();
$c->addCommand(new SMSCommanad());
$c->addCommand(new MainlCommand());

$c->runCommand('NotifyUser', array('metodo' => 'mail', 'user' => 'test'));