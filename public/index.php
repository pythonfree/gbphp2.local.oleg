<?php

include __DIR__ . '/../engine/Autoload.php';
spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product();

var_dump($product);