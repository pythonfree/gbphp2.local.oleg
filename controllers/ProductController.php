<?php


namespace app\controllers;


use app\model\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;
        $catalog = Product::getLimit(($page + 1) * PRODUCT_PER_PAGE);

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page,
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $good = Product::getOne($id);
        echo $this->render('card', [
            'good' => $good,
        ]);
    }
}