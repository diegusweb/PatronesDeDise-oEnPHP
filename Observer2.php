<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/2/2017
 * Time: 3:46 PM
 */
class Partido implements \SplSubject
{
    protected $teams = array();
    protected $observers = array();

    public function __construct($team1, $team2)
    {
        $this->teams = array(
            $team1 => 0,
            $team2 => 0
        );
    }

    public function gol($team)
    {
        $this->teams[$team]++;
        $this->notify();
    }

    public function getScores()
    {
        $return = '';
        foreach ($this->teams as $name => $score) {
            $return .= $name.': '.$score.' ! ';
        }

        return trim($return, ' ! ');
    }

    public function attach(SplObserver $observer)
    {
        $id = spl_object_hash($observer);
        $this->observers[$id] = $observer;
    }


    public function detach(SplObserver $observer)
    {
        $id = spl_object_hash($observer);
        if(isset($this->observers[$id])){
            unset($this->observers[$id]);
        }
    }


    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
       }
    }
}

class Mail implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo 'Enviando Email con marcador ' . $subject->getScore() . PHP_EOL;
        mail('email@test.com', 'Hubo un gol', $subject->getScore());
    }
}
/**
 * Segundo Observador, guarda en un archivo
 */
class Log implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo 'Guardando archivo con marcador ' . $subject->getScore() . PHP_EOL;
        file_put_contents('partido.log', $subject->getScore(), FILE_APPEND);
    }
}

$partido = new Partido('Bolivia', 'Ecuador');

$partido->attach(new Mail());
$partido->attach(new Log());

$partido->gol('Bolvia');
$partido->gol('Bolvia');
$partido->gol('Ecuador');

echo $partido->getScores();