<?php

namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\Users;

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
            echo '404 нет такого экшена';
        }
    }

    public function render($template, $params = [])
    {
        // Вынесла сюда т.к. хочу на всех страницах знать, что пользователь авторизован, а не только на странице авторизации
        if(Users::isAuth()) {
            $params['allow'] = true;
            $params['login'] = Users::getName();
        }
        
        // Потом добавлю сюда логику для определения админа
        // if(checkRole($_SESSION['login'])) {    
        // $params['isAdmin'] = true;
        // }

        return $this->renderTemplate('layouts/layout', [
            'header' => $this->renderTemplate('modules/header', [
                'menu' => $this->renderTemplate('modules/menu', $params)
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