<?php

namespace app\models;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    abstract public function getTableName();

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $keys = [];
        $params = [];
        foreach($this as $key=>$value) {
            if($key !== 'id') {
                $keys[] = $key;
                $params[$key] = $value;
            };
        }

        $strKeys = implode(', ', $keys);
        $strValues = ":" . implode(', :', $keys);

        $sql = "INSERT INTO {$this->getTableName()} ({$strKeys}) VALUES ({$strValues})";

        Db::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function update()
    {
        $keys = [];
        $params = [];
        foreach($this as $key=>$value) {
            if($key !== 'id') $keys[] = $key . "=" . ":{$key}";
            $params[$key] = $value;
        }

        $strKeys = implode(', ', $keys);

        $sql = "UPDATE {$this->getTableName()} SET {$strKeys} WHERE id = :id";
        return Db::getInstance()->execute($sql, $params);
    }

    public function delete() 
    {
        $id = $this->id;
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $id]);
    }
}