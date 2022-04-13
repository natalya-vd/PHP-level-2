<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionBasket()
    {
        $session_id = (new Session())->getSessionId();

        $basket = (new BasketRepository())->getBasket($session_id);

        echo $this->render('basket', [
            'title' => 'Корзина',
            'basket' => $basket,
            'sumBasket' => (new BasketRepository())->getSum($session_id)
        ]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $price = (new Request())->getParams()['price'];

        $session_id = (new Session())->getSessionId();
        $session = (new Session())->getSession();
        $users_id = empty($session) ? 0 : $session['id'];

        $basket = new Basket($id, $price, $session_id, '1', $users_id);
        (new BasketRepository())->save($basket);

        $response = [
            'status' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('id', 'session_id', $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];

        $session_id = (new Session())->getSessionId();

        $basket = (new BasketRepository())->getOne($id);

        $error = 'ok';
        if($session_id == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        } else {
            $error = 'error';
        }

        $response = [
            'status' => $error,
            'count' => (new BasketRepository())->getCountWhere('id', 'session_id', $session_id),
            'sumBasket' => (new BasketRepository())->getSum($session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}