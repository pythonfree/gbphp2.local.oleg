<?php

namespace app\model\repositories;


use app\model\Repository;
use app\model\entities\Basket;
use app\engine\App;

class BasketRepository extends Repository
{

    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description,
        products.price FROM `basket`, `products` WHERE `session_id` = :session AND basket.product_id = products.id";
        return App::call()->db->queryAll($sql, ['session' => $session_id]);
    }

    public static function getSummBasket()
    {
        return 5;
    }

    protected function getEntityClass()
    {
        return Basket::class;
    }

    protected function getTableName()
    {
        return 'basket';
    }
}