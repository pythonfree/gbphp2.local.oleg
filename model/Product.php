<?php

namespace app\model;


class Product extends DbModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $temp;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false
    ];

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }


}