<?php
/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/21/2017
 * Time: 4:17 PM
 */

namespace Polymorphismo;

//we create an interface class
interface Shape{
    public function clacArea();

}

class Circle implements Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function clacArea()
    {
        return $this->radius*$this->radius*pi();
    }
}

class Rectangle implements Shape
{
    private $width;
    private $heught;

    public function __construct($w, $h)
    {
        $this->width = $w;
        $this->heught = $h;
    }

    public function clacArea()
    {
        return $this->width * $this->heught;
    }
}

//test ejemplo de uso

$circ = new Circle(5);
$rect = new Rectangle(6,8);

echo $circ->clacArea();
echo $rect->clacArea();