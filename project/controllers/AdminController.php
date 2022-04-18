<?php

namespace app\controllers;

use app\engine\App;

class AdminController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionAdmin()
    {
        $orders = App::call()->ordersRepository->getOrders();
        var_dump($orders);

        // foreach($orders as $key => $order) {
        //     $productsList['productsList'] = getAssocResult("SELECT basket.price, basket.quantity, products.name_product, products.path 
        //     FROM `basket` INNER JOIN `products` 
        //     ON `session_id` = '{$order['session_id']}' AND basket.id_product = products.id");

        //     $sumBasket = getOneResult(getSumBasket($order['session_id']));
        //     $orders[$key]['sum'] = $sumBasket['sum'];

        //     $orders[$key] = array_merge($orders[$key], $productsList);
        // }

        echo $this->render('admin', [
            'title' => 'Админка',
            'ordersList' => $orders,
        ]);
    }
}