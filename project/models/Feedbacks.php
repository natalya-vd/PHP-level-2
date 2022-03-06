<?php

namespace app\models;

class Feedbacks extends Model
{
    public $id;
    public $name;
    public $feedback;
    public $product_id;

    public function __construct($name = null, $feedback = null, $product_id = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->product_id = $product_id;
    }

    public function getTableName()
    {
        return 'feedbacks';
    }
}