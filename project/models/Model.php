<?php

namespace app\models;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel {
  protected $db;

  public function __construct(Db $db)
  {
    $this->db = $db;
  }

  abstract public function getTableName();

  public function getOne($id)
  {
    $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
    return $this->db->queryOne($sql);
  }

  public function getAll()
  {
    $sql = "SELECT * FROM {$this->getTableName()}";
    return $this->db->queryAll($sql);
  }
}