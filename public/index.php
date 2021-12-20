<?php

include __DIR__ . '/../config/config.php';
include __DIR__ . '/../engine/Autoload.php';
use app\engine\Autoload;
spl_autoload_register([new Autoload(), 'loadClass']);

use \app\model\Product;
use \app\model\Users;


$product = new Product();
var_dump($product->getOne(2));


die;
//CREATE
$product = new Product('Чай', 'Цейлонский', '25');
$product->insert();

//READ
$product = new Product();
$product->getOne(4);

//UPDATE
$product->name = 'Чай2';
$product->update();

//DELETE
$product->delete();