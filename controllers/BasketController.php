<?php


namespace app\controllers;


use app\engine\Request;
use app\model\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id())
        ]);
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $session = session_id();
        $basket = Basket::getOne($id);
        if ($session == $basket->session_id) {
            $basket->delete();
        }

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id))->save();

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //header('Location: /product/catalog');
    }
}