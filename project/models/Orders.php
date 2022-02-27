<?php

namespace app\models;

class Orders extends Model {
  public $id;
  public $session_id;
  public $phone;
  public $name_user;
  public $users_id;
  public $status;

  public function getTableName()
  {
    return 'orders';
  }
}