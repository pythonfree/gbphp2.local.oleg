<?php


namespace app\model;


class Basket extends DbModel
{

    protected $id;
    protected $session_id;
    protected $product_id;

    protected $props = [
        'session_id' => false,
        'product_id' => false
    ];

    public static function getBasket()
    {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description,
        products.price FROM `basket`, `products` WHERE `session_id` = '111' AND basket.product_id = products.id";
        return [];
    }

    public static function getSummBasket()
    {
        return 5;
    }

    public static function getTableName()
    {
        return 'basket';
    }
}