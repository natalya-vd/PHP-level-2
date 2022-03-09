<?php

namespace app\models;

class Gallery extends DBModel
{
    protected $id;
    protected $name;
    protected $size;
    protected $quantity_views;

    protected $props = [
        'name' => false,
        'size' => false,
        'quantity_views' => false,
    ];

    public function __construct($name = null, $size = null, $quantity_views = null)
    {
        $this->name = $name;
        $this->size = $size;
        $this->quantity_views = $quantity_views;
    }

    public static function getTableName()
    {
        return 'gallery';
    }
}