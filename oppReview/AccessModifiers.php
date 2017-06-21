<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 12:17 PM
 */
class UserAccess
{
    private $firstName;

    public function setFirstName($firsName)
    {
        $this->firstName = $firsName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
}

$newUser = new UserAccess();
$newUser->setFirstName("Diego");
echo $newUser->getFirstName();