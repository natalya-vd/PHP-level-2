<?php

use app\engine\Autoload;
use app\models\{Products, Feedbacks};
use app\interfaces\IModel;

include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

spl_autoload_register([new Autoload(), 'loadClass']);

function getAll(IModel $model) {
    return $model->getAll();
}

function getOne(IModel $model, $id) {
    return $model->getOne($id);
}

$products = new Products("Пицца", 125, "sushi.jpg", "Описание");
var_dump($products);
// $products->update()
// $products->insert()

var_dump(getOne($products, 1));
var_dump(getAll($products));

// $feedbacks = new Feedbacks();
// var_dump(getOne($feedbacks, 1));
// var_dump(getAll($feedbacks));
