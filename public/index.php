<?php


//include __DIR__ . '/../engine/Autoload.php';
require_once '../vendor/autoload.php';

use app\engine\App;


//spl_autoload_register([new Autoload(), 'loadClass']);

$config = include '../config/config.php';

try {
    App::call()->run($config);
} catch (\Throwable $e) {
    var_dump($e);
}