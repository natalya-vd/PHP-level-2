<?php

session_start();

use app\engine\Autoload;
use app\engine\Request;
use app\engine\TwigRender;
use app\exceptions\EntityException;

// include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

include '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);
try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER . ucfirst($controllerName) . 'Controller';

    if(class_exists($controllerClass)) {
        $controller = new $controllerClass(new TwigRender(ROOT . '/viewsTwig'));
        $controller->runAction($actionName);
    } else {
        throw new Exception('Нет такого класса', 404);
    }
} catch(PDOException $e) {
    var_dump($e);
} catch(EntityException $e) {
    var_dump($e->getVariantsError());
} catch(Exception $e) {
    echo $e->getMessage();
}
