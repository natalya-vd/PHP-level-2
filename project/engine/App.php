<?php

namespace app\engine;

use app\models\repositories\BasketRepository;
use app\models\repositories\FeedbacksRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductsRepository;
use app\models\repositories\UsersRepository;
use app\traits\TSingletone;

/**
 * Class App
 * @property Request $request
 * @property Session $session
 * @property BasketRepository $basketRepository
 * @property FeedbacksRepository $feedbacksRepository
 * @property OrdersRepository $ordersRepository
 * @property ProductsRepository $productsRepository
 * @property UsersRepository $usersRepository
 * @property Db $db
 */
class App
{
    use TSingletone;

    public $config;
    private $components;

    private $controller;
    private $action;

    private function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();
        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . 'Controller';

        if(class_exists($controllerClass)) {
            $controller = new $controllerClass(new TwigRender($this->config['root'] . '/viewsTwig'));
            $controller->runAction($this->action);
        } else {
            throw new \Exception('Нет такого класса', 404);
        }
    }

    /**
     * @return static
     */
    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public function createComponent($name) {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);

                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        die("Компонента {$name} не существует в конфигурации системы!");
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }
}