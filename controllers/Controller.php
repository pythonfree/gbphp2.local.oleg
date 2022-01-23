<?php


namespace app\controllers;


use app\engine\Render;
use app\interfaces\IRenderer;

class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $defaultLayout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        //TODO method_exists($this, $method) тоже сработает
        if (method_exists(static::class, $method)) {
            $this->$method();
        }
    }
    //Рендер полной страницы, со вставкой подшаблонов
    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->defaultLayout}", [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }
}