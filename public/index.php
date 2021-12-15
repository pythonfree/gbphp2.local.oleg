<?php

include __DIR__ . '/../engine/Autoload.php';
spl_autoload_register([new Autoload(), 'loadClass']);


$product = new app\model\Product();
$product->delete();