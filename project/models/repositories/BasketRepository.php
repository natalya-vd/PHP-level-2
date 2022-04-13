<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Basket;
use app\engine\Db;

class BasketRepository extends Repository
{
    protected function getTableName()
    {
        return 'basket';
    }

    protected function getEntityClass()
    {
        return Basket::class;
    }

    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id as basket_id, basket.product_id, basket.price, basket.quantity, basket.session_id, products.name_product, products.path FROM `basket`, `products` WHERE `session_id` = :session_id AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public function getSum($session_id) {
        $tableName = $this->getTableName();
        $sql = "SELECT SUM(basket.price) as sum FROM $tableName WHERE `session_id` = :session_id";

        return Db::getInstance()->queryOne($sql, ['session_id' => $session_id])['sum'];
    }
}