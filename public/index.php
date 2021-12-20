<?php

include __DIR__ . '/../engine/Autoload.php';
spl_autoload_register([new Autoload(), 'loadClass']);

use \app\engine\Db;
use \app\model\Product;
use \app\model\Users;


$product = new Product();
$users = new Users();


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