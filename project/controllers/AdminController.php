<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Orders;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class AdminController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionAdmin()
    {
        $orders = App::call()->ordersRepository->getOrders();

        foreach($orders as $key => $order) {
            $session_id = $order['session_id'];
            $productsList['productsList'] = App::call()->basketRepository->getBasketOrders($session_id);

            $sumBasket = App::call()->basketRepository->getSum($session_id);

            $orders[$key]['sum'] = $sumBasket;

            $orders[$key] = array_merge($orders[$key], $productsList);
        }

        echo $this->render('admin', [
            'title' => 'Админка',
            'ordersList' => $orders,
        ]);
    }

    public function actionStatusOrder()
    {
        $id = App::call()->request->getParams()['id'];

        $orders = App::call()->ordersRepository->getOne($id);

        $orders->status = 'Заказ оформлен';

        App::call()->ordersRepository->save($orders);

        $response = [
            'status' => 'Заказ оформлен',
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}