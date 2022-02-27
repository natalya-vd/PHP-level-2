<?php

namespace app\models;

class Gallery extends Model {
  public $id;
  public $name;
  public $size;
  public $quantity_views;

  public function getTableName()
  {
    return 'gallery';
  }
}