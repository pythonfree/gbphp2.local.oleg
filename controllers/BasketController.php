<?php


namespace app\controllers;


use app\engine\Request;
use app\model\entities\Basket;
use app\model\repositories\BasketRepository;
use app\engine\App;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'basket' => App::call()->basketRepository->getBasket(session_id())
        ]);
    }

    public function actionDelete()
    {
        $error = 'ok';
        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOne($id);

        if ($session == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        } else {
            $error = 'Нет прав на удаление';
        }

        $response = [
            'success' => $error,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];

        $basket = new Basket(session_id(), $id);

        App::call()->basketRepository->save($basket);

        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //header('Location: /product/catalog');
    }
}