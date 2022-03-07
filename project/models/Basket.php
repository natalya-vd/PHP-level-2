<?php

namespace app\models;
use app\engine\Db;

class Basket extends DBModel
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

    public function __construct($product_id = null, $price = null, $quantity = null, $session_id = null, $users_id = null)
    {
        $this->product_id = $product_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->session_id = $session_id;
        $this->users_id = $users_id;
    }

    public static function getBasket()
    {
        $sql = "SELECT basket.id, basket.product_id, basket.price, basket.quantity, basket.session_id, products.name_product, products.path FROM `basket`, `products` WHERE basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql);
    }

    public static function getTableName()
    {
        return 'basket';
    }
}