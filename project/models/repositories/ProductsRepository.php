<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Products;

class ProductsRepository extends Repository
{
    protected function getTableName()
    {
        return 'products';
    }

    protected function getEntityClass()
    {
        return Products::class;
    }
}