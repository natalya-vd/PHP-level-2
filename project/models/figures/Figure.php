<?php

namespace app\models\figures;

abstract class Figure {
  abstract public function calcSquare();

  abstract public function calcPerimeter();

  abstract public function getNameFigure();

  abstract public function getInfoSides();

  public function info()
  {
    echo $this->getInfoSides();
    echo "Площадь {$this->getNameFigure()} = {$this->calcSquare()}<br>";
    echo "Периметр {$this->getNameFigure()} = {$this->calcPerimeter()}<br><br>";
  }
}