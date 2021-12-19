<?php

include __DIR__ . '/../engine/Autoload.php';
spl_autoload_register([new Autoload(), 'loadClass']);

$product = new \app\model\Product(new \app\engine\Db());

var_dump($product instanceof \app\model\Product);