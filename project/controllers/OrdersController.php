<?php

namespace app\controllers;
use app\engine\App;
use app\models\entities\Orders;

class OrdersController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionOrders()
    {
        $session_id = App::call()->session->getSessionId();

        $basket = App::call()->basketRepository->getBasket($session_id);

        $error = 'ok';
        if(empty($basket)) {
            $error = 'error';
        }

        echo $this->render('order', [
            'title' => 'Заказы',
            'status' => $error,
        ]);
    }

    public function actionAdd()
    {
        $user_name = App::call()->request->getParams()[0]->name_user;
        $phone = App::call()->request->getParams()[1]->phone;

        $session_id = App::call()->session->getSessionId();
        $session = App::call()->session->getSession();
        $users_id = empty($session) ? 0 : $session['id'];

        $orders = new Orders($session_id, $phone, $user_name, $users_id, 'Ожидает оформления');
        App::call()->ordersRepository->save($orders);
        App::call()->session->sessionRegenerate();
        
        $response = [
            'status' => 'success',
            'count' => '0'
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}