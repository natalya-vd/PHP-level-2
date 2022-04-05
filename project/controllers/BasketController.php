<?php

namespace app\controllers;

use app\engine\Session;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionBasket()
    {
        $session_id = session_id();

        $basket = Basket::getBasket($session_id);

        echo $this->render('basket', [
            'title' => 'Корзина',
            'basket' => $basket,
            'sumBasket' => Basket::getSum($session_id)
        ]);
    }

    public function actionAdd()
    {
        $request = json_decode(file_get_contents('php://input'));

        // header("Content-type: application/json");

        $session_id = session_id();
        $session = (new Session())->getSession();
        $users_id = empty($session) ? 0 : $session['id'];

        (new Basket($request->id, $request->price, $session_id, '1', $users_id))->save();

        $response = [
            'status' => 'ok',
            'count' => Basket::getCountWhere('id', 'session_id', $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {
        $request = json_decode(file_get_contents('php://input'));

        // header("Content-type: application/json");

        $session_id = session_id();

        $product = Basket::getOne($request->id);
        $product->delete();

        $response = [
            'status' => 'ok',
            'count' => Basket::getCountWhere('id', 'session_id', $session_id),
            'sumBasket' => Basket::getSum($session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}