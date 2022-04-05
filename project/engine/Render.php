<?php

namespace app\engine;
use app\interfaces\IRenderer;

class Render implements IRenderer
{
    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);

        include ROOT . VIEWS_DIR . $template . '.php';
        return ob_get_clean();
    }
}