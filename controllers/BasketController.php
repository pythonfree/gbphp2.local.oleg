<?php


namespace app\controllers;


use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id())
        ]);
    }

    public function actionAdd()
    {
        $id = $_POST['id'];
        (new Basket(session_id(), $id))->save();
        header('Location: /product/catalog');
    }
}