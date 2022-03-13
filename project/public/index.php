<?php

use app\engine\Autoload;
// use app\engine\Render;
use app\engine\TwigRender;

include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

include '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER . ucfirst($controllerName) . 'Controller';

if(class_exists($controllerClass)) {
    // $controller = new $controllerClass(new Render());
    $controller = new $controllerClass(new TwigRender(ROOT . '/viewsTwig'));
    $controller->runAction($actionName);
} else {
    echo ' 404 Нет такого класса';
}
