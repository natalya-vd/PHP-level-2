<?php

namespace app\models\figures;

class Rectangle extends Figure {
  public $a;

  function __construct($a = null)
  {
    $this->a = $a;
  }
  public function calcSquare()
  {
    return $this->a**2;
  }

  public function calcPerimeter()
  {
    return 4 * $this->a;
  }

  public function getNameFigure()
  {
    return 'квадрата';
  }

  public function getInfoSides()
  {
    return "Сторона {$this->getNameFigure()} = {$this->a}<br>";
  }
}