<?php

include __DIR__ . '/../config/config.php';
include __DIR__ . '/../engine/Autoload.php';

use app\engine\Autoload;
use app\model\{Product};
use app\engine\Render;


spl_autoload_register([new Autoload(), 'loadClass']);

//TODO $controllerName = $_GET['c'] ?: 'product';
$controllerName = $_GET['c'] ?? 'product';
//TODO $actionName = $_GET['a'];
$actionName = $_GET['a'] ?? 'index';
$controllerName = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerName)) {
    $controller = new $controllerName(new Render());
    $controller->runAction($actionName);
}































































die;



$product = new Product('Чай', 'Цейлонский', '25');
var_dump($product);
$product->save();
var_dump($product);
die;

$product = new Product();
var_dump($product->getOne(1));
var_dump($product->getAll());

var_dump($product);

$user = new User();
var_dump($user->getOne(1));

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