<?php

use app\engine\Db;
use app\engine\Request;
use app\engine\Session;
use app\engine\TwigRender;
use app\models\repositories\BasketRepository;
use app\models\repositories\FeedbacksRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductsRepository;
use app\models\repositories\UsersRepository;

return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 4,
    'views_dir' => dirname(__DIR__) . "/views/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'user',
            'password' => '12345',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'session' => [
            'class' => Session::class
        ],
        'twigRender' => [
            'class' => TwigRender::class //????
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productsRepository' => [
            'class' => ProductsRepository::class
        ],
        'usersRepository' => [
            'class' => UsersRepository::class
        ],
        'feedbacksRepository' => [
            'class' => FeedbacksRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ]
    ]

];
