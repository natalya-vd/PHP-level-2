<?php

use app\engine\Autoload;
use app\models\{Basket, Users};
use app\engine\Db;
use app\interfaces\IModel;

use app\models\figures\Rectangle;
use app\models\figures\Circle;
use app\models\figures\Triangle;

include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

function getAll(IModel $model) {
  echo $model->getAll();
}

function getOne(IModel $model, $id) {
  echo $model->getOne($id);
}

$basket = new Basket($db);
getOne($basket, 1);
getAll($basket);

$user = new Users($db);
getOne($user, 3);
getAll($user);


function info($figure) {
  $figure->info();
}

$rectangle = new Rectangle(3);
info($rectangle);

$circle = new Circle(10);
info($circle);

$triangle = new Triangle(1, 2, 3, 4);
info($triangle);