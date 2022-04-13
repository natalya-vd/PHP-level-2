<?php

namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\repositories\UsersRepository;
use app\models\repositories\BasketRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);

        if(method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \Exception('Нет такого экшена', 404);
        }
    }

    public function render($template, $params = [])
    {
        if((new UsersRepository())->isAuth()) {
            $params['allow'] = true;
            $params['login'] = (new UsersRepository())->getName();
        }
        
        // Потом добавлю сюда логику для определения админа
        // if(checkRole($_SESSION['login'])) {    
        // $params['isAdmin'] = true;
        // }

        return $this->renderTemplate('layouts/layout', [
            'header' => $this->renderTemplate('modules/header', [
                'menu' => $this->renderTemplate('modules/menu', [
                    'count' => (new BasketRepository())->getCountWhere('id', 'session_id', session_id())
                ])
            ]),
            'content' => $this->renderTemplate($template, $params),
            'footer' => $this-> renderTemplate('modules/footer', ['date' => date ('Y')])
        ]);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}