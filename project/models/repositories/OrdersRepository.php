<?php

namespace app\models\repositories;
use app\models\entities\Orders;
use app\models\Repository;
use app\engine\App;

class OrdersRepository extends Repository
{
    protected function getTableName()
    {
        return 'orders';
    }

    protected function getEntityClass()
    {
        return Orders::class;
    }

    public function getOrders()
    {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM $tableName ORDER BY id DESC";

        return App::call()->db->queryAll($sql);
    }
}