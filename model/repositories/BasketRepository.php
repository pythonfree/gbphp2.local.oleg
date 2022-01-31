<?php

namespace app\model\repositories;


use app\engine\Db;
use app\model\Repository;
use app\model\entities\Basket;

class BasketRepository extends Repository
{

    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description,
        products.price FROM `basket`, `products` WHERE `session_id` = :session AND basket.product_id = products.id";
        return Db::getInstance()->queryAll($sql, ['session' => $session_id]);
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