<?php


namespace app\controllers;


use app\engine\Request;
use app\model\entities\Basket;
use app\model\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => (new BasketRepository())->getBasket(session_id())
        ]);
    }

    public function actionDelete()
    {
        $error = 'ok';
        $id = (new Request())->getParams()['id'];
        $session = session_id();
        $basket = (new BasketRepository())->getOne($id);
        if ($session == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        } else {
            $error = 'Нет прав на удаление';
        }

        $response = [
            'success' => $error,
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        //(new Basket(session_id(), $id))->save();

        $basket = new Basket(session_id(), $id);
        (new BasketRepository())->save($basket);

        $response = [
            'success' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //header('Location: /product/catalog');
    }
}