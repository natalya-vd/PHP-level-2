<?php

namespace app\controllers;

class Controller
{
    private $action;
    private $defaultAction = 'index';

    public function actionIndex()
    {
        echo $this->render('index');
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
        return $this->renderTemplate('layouts/layout', [
            'header' => $this->renderTemplate('modules/header', [
                'menu' => $this->renderTemplate('modules/menu', $params)
            ]),
            'content' => $this->renderTemplate($template, $params),
            'footer' => $this-> renderTemplate('modules/footer', ['date' => date ('Y')]),
        ]);
    }

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);

        include ROOT . VIEWS_DIR . $template . '.php';
        return ob_get_clean();
    }
}