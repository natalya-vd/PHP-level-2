<?php

namespace app\models;

class Products extends Model
{
    public $id;
    public $name_product;
    public $price;
    public $path;
    public $description;

    public function __construct($name_product = null, $price = null, $path = null, $description = null)
    {
        $this->name_product = $name_product;
        $this->price = $price;
        $this->path = $path;
        $this->description = $description;
    }

    public function getTableName()
    {
        return 'products';
    }
}