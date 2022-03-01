<?php

namespace app\models\figures;

class Triangle extends Figure {
  public $a;
  public $b;
  public $c;
  public $h;

  function __construct($a = null, $b = null, $c = null, $h = null)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
    $this->h = $h;
  }

  public function calcSquare()
  {
    return 1/2 * $this->a * $this->h;
  }

  public function calcPerimeter()
  {
    return $this->a + $this->b + $this->c;
  }

  public function getNameFigure()
  {
    return 'треугольника';
  }

  public function getInfoSides()
  {
    return "Стороны {$this->getNameFigure()} = {$this->a}, {$this->b}, {$this->c}. Высота = {$this->h}<br>";
  }
}