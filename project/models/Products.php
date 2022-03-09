<?php

namespace app\models;

class Products extends DBModel
{
    protected $id;
    protected $name_product;
    protected $price;
    protected $path;
    protected $description;

    protected $props = [
        'name_product' => false,
        'price' => false,
        'path' => false,
        'description' => false,
    ];

    public function __construct($name_product = null, $price = null, $path = null, $description = null)
    {
        $this->name_product = $name_product;
        $this->price = $price;
        $this->path = $path;
        $this->description = $description;
    }

    public static function getTableName()
    {
        return 'products';
    }
}