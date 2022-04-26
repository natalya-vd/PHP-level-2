<?php

namespace app\models\entities;

use app\models\Entity;

class Basket extends Entity
{
    protected $id;
    protected $product_id;
    protected $price;
    protected $quantity;
    protected $session_id;
    protected $users_id;

    protected $props = [
        'product_id' => false,
        'price' => false,
        'quantity' => false,
        'session_id' => false,
        'users_id' => false,
    ];

    public function __construct($product_id = null, $price = null, $session_id = null, $quantity = null, $users_id = null)
    {
        $this->product_id = $product_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->session_id = $session_id;
        $this->users_id = $users_id;
    }
}