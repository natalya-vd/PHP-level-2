<?php

namespace app\models;

use app\engine\App;

abstract class Repository {
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return App::call()->db->queryAll($sql);
    }

    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";

        return App::call()->db->queryLimit($sql, $limit);
    }

    public function getCountWhere($field, $name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count({$field}) as count FROM $tableName WHERE {$name} = :value";

        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    public function getWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE {$name} = :value";

        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getWhereAll($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName WHERE {$name} = :value";

        return App::call()->db->queryAll($sql, ['value' => $value]);
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

        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();

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
        App::call()->db->execute($sql, $params);

        return $this;
    }

    public function delete(Entity $entity) 
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
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