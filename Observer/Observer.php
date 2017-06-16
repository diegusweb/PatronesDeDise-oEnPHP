<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/2/2017
 * Time: 11:56 AM
 */
interface Observer
{
    public function onChanged($sender, $args);

}

interface IObservable
{
    public function addOberver($observer);

}

class UserList implements IObservable
{
    private $obervers = array();

    public function addCustomers($name)
    {
        foreach ($this->obervers as $obs){
            $obs->onChanged($this, $name);
        }
    }

    public function addOberver($observer)
    {
        $this->obervers[] = $observer;
    }
}

class UserListLogger implements IObserver
{
    public function onChanged( $sender, $args )
    {
        echo( "'$args' added to user list\n" );
    }
}

$test = new UserList();
$test->addOberver( new UserListLogger());
$test->addOberver("Diego");