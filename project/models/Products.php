<?php

namespace app\models;

class Products extends Model {
  public $id;
  public $name_product;
  public $price;
  public $path;
  public $description;

  public function getTableName()
  {
    return 'products';
  }
}