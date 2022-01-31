<?php


namespace app\model\repositories;


use app\model\entities\Product;
use app\model\Repository;

class ProductRepository extends Repository
{

    public function getCatalog()
    {

    }

    public function getTableName()
    {
        return 'products';
    }

    protected function getEntityClass()
    {
        return Product::class;
    }
}