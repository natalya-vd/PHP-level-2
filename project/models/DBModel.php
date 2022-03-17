<?php

namespace app\models;
use app\engine\Db;

abstract class DBModel extends Model {
    abstract public static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";

        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public static function getWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName WHERE {$name} = :value";

        return Db::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
    }

    public function insert()
    {
        $tableName = static::getTableName();
        $params = [];

        foreach($this->props as $key=>$value) {
            $params[':' . $key] = $this->$key;
        }

        $strKeys = implode(', ', array_keys($this->props));
        $strValues = implode(', ', array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$strKeys}) VALUES ({$strValues})";

        Db::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function update()
    {
        $tableName = static::getTableName();
        $keys = [];
        $params = [':id' => $this->id];

        foreach($this->props as $key=>$value) {
            if($value)  {
                $keys[] = $key . "=" . ":{$key}";
                $params[':' . $key] = $this->$key;
                $this->props[$key] = false;
            }
        }

        $strKeys = implode(', ', $keys);

        $sql = "UPDATE {$tableName} SET {$strKeys} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);

        return $this;
    }

    public function delete() 
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save()
    {
        if(is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}