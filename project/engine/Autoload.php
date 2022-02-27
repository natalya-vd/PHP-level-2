<?php

namespace app\engine;

class Autoload {
  public function loadClass($className)
  {
    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/" . str_replace(['app', '\\'], ['..', '/'], $className) . ".php";

    if(file_exists($fileName)) {
      include $fileName;
    }
  }
}