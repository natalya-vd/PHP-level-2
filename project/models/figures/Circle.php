<?php

namespace app\models\figures;

class Circle extends Figure {
  public $r;

  const PI = 3.14;

  function __construct($r = null)
  {
    $this->r = $r;
  }
  public function calcSquare()
  {
    return self::PI * $this->r**2;
  }

  public function calcPerimeter()
  {
    return 2 * self::PI * $this->r;
  }

  public function getNameFigure()
  {
    return 'круга';
  }

  public function getInfoSides()
  {
    return "Радиус {$this->getNameFigure()} = {$this->r}<br>";
  }
}