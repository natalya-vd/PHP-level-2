<?php

namespace app\models;
use app\engine\Db;

abstract class Repository {
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }

    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";

        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public function getCountWhere($field, $name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count({$field}) as count FROM $tableName WHERE {$name} = :value";

        return Db::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public function getWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE {$name} = :value";

        return Db::getInstance()->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getWhereAll($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE {$name} = :value";

        return Db::getInstance()->queryAll($sql, ['value' => $value]);
    }

    //new Basket()
    //new BasketRepository()->insert($basket)
    public function insert(Entity $entity)
    {
        $tableName = $this->getTableName();
        $params = [];

        foreach($entity->props as $key => $value) {
            $params[':' . $key] = $entity->$key;
        }

        $strKeys = implode(', ', array_keys($entity->props));
        $strValues = implode(', ', array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$strKeys}) VALUES ({$strValues})";

        Db::getInstance()->execute($sql, $params);
        $entity->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function update(Entity $entity)
    {
        $tableName = $this->getTableName();
        $keys = [];
        $params = [':id' => $entity->id];

        foreach($entity->props as $key=>$value) {
            if($value)  {
                $keys[] = $key . "=" . ":{$key}";
                $params[':' . $key] = $entity->$key;
                $entity->props[$key] = false;
            }
        }

        $strKeys = implode(', ', $keys);

        $sql = "UPDATE {$tableName} SET {$strKeys} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);

        return $this;
    }

    public function delete(Entity $entity) 
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    public function save(Entity $entity) 
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}