<?php

namespace app\models;

class Basket extends Model {
  public $id;
  public $id_product;
  public $price;
  public $quantity;
  public $session_id;
  public $users_id;

  public function getTableName()
  {
    return 'basket';
  }
}