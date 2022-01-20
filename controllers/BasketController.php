<?php


namespace app\controllers;


use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {

        $basket = Basket::getBasket();

        echo $this->render('basket');
    }
}