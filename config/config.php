<?php

use app\engine\Db;
use app\engine\Request;
use app\engine\Session;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UserRepository;

//define('CONTROLLERS_NAMESPACE', 'app\\controllers\\');
//define('ROOT_DIR', dirname(__DIR__));
//define('DS', DIRECTORY_SEPARATOR);
//define('TEMPLATE_DIR', dirname(__DIR__) . '/views/');
//define('PRODUCT_PER_PAGE', 2);

return [
    'root_dir' => dirname(__DIR__),
    'templates_dir' =>dirname(__DIR__). '/views/',
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 2,
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'root',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'session' => [
            'class' => Session::class
        ]
    ]
];