<?php

namespace app\models;

class Gallery extends Model
{
    public $id;
    public $name;
    public $size;
    public $quantity_views;

    public function __construct($name = null, $size = null, $quantity_views = null)
    {
        $this->name = $name;
        $this->size = $size;
        $this->quantity_views = $quantity_views;
    }

    public function getTableName()
    {
        return 'gallery';
    }
}