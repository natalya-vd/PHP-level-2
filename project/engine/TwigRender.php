<?php

namespace app\engine;
use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    protected $loader;
    protected $twig;

    public function __construct($views)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader($views);
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . '.twig', $params);
    }
}