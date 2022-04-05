<?php

namespace app\models;
use app\interfaces\IModel;

abstract class Model implements IModel 
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
        if(!is_null($this->$name)) {
            return $this->$name;
        } else {
            die('Нет такого поля');
        }
    }

    public function __isset($name) {
        if(!is_null($this->$name)) {
            return $this->$name;
        } else {
            die('Нет такого поля');
        }
    }
}