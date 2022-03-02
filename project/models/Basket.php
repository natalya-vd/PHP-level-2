<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $product_id;
    public $price;
    public $quantity;
    public $session_id;
    public $users_id;

    public function __construct($product_id = null, $price = null, $quantity = null, $session_id = null, $users_id = null)
    {
        $this->product_id = $product_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->session_id = $session_id;
        $this->users_id = $users_id;
    }

    public function getTableName()
    {
        return 'basket';
    }
}