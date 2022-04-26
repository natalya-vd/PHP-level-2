<?php

namespace app\models;
use app\exceptions\EntityException;

abstract class Entity
{
    protected $props = [];

    public function __set($name, $value)
    {
        if(!is_null($this->props[$name])) {
            $this->$name = $value;
            $this->props[$name] = true;
        }
    }

    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new EntityException('get');
        }
    }

    public function __isset($name) {
        if(property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new EntityException('isset');
        }
    }
}