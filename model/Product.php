<?php

namespace app\model;

use app\engine\Db;

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function delete()
    {
        $sql = 'DELETE';
        $db = new Db();
        $db->execute($sql);
    }

}