<?php

session_start();

use app\exceptions\EntityException;
use app\engine\App;

include '../vendor/autoload.php';

$config = include "../config/config.php";

try {
    App::call()->run($config);
} catch(PDOException $e) {
    var_dump($e);
} catch(EntityException $e) {
    var_dump($e->getVariantsError());
} catch(Exception $e) {
    echo $e->getMessage();
}
