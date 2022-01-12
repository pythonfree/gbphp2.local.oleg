<?php


namespace app\controllers;


class ProductController
{
    private $action;
    private $defaultAction = 'index';

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        //TODO method_exists($this, $method) тоже сработает
        if (method_exists(static::class, $method)) {
            $this->$method();
        }
    }

    public function actionIndex()
    {
        echo 'Главная';
    }

    public function actionCatalog()
    {
        echo 'catalog';
    }

    public function actionCard()
    {
        echo 'card';
    }
}