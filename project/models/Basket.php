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

    public function __construct($product_id = null, $price = null, $session_id = null, $quantity = null, $users_id = null)
    {
        $this->product_id = $product_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->session_id = $session_id;
        $this->users_id = $users_id;
    }

    public static function getBasket($session_id)
    {
        $sql = "SELECT basket.id as basket_id, basket.product_id, basket.price, basket.quantity, basket.session_id, products.name_product, products.path FROM `basket`, `products` WHERE `session_id` = :session_id AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getSum($session_id) {
        $tableName = static::getTableName();
        $sql = "SELECT SUM(basket.price) as sum FROM $tableName WHERE `session_id` = :session_id";

        return Db::getInstance()->queryOne($sql, ['session_id' => $session_id])['sum'];
    }

    public static function getTableName()
    {
        return 'basket';
    }
}