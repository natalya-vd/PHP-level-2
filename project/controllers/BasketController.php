<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionBasket()
    {
        $session_id = App::call()->session->getSessionId();
        $basket = App::call()->basketRepository->getBasket($session_id);

        $user_id = App::call()->session->getSession()['id'];

        if(!is_null($user_id)) {
            $oldBaskets = App::call()->basketRepository->getProductsOldBaskets();
        }

        echo $this->render('basket', [
            'title' => 'Корзина',
            'basket' => $basket,
            'sumBasket' => App::call()->basketRepository->getSum($session_id),
            'oldBaskets' => $oldBaskets,
        ]);
    }

    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];
        $price = App::call()->request->getParams()['price'];

        $session_id = App::call()->session->getSessionId();
        $session = App::call()->session->getSession();
        $users_id = empty($session) ? 0 : $session['id'];

        $basket = new Basket($id, $price, $session_id, '1', $users_id);
        App::call()->basketRepository->save($basket);

        $response = [
            'status' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('id', 'session_id', $session_id),
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];

        $session_id = App::call()->session->getSessionId();

        $basket = App::call()->basketRepository->getOne($id);

        $error = 'ok';
        if($session_id == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        } else {
            $error = 'error';
        }

        $response = [
            'status' => $error,
            'count' => App::call()->basketRepository->getCountWhere('id', 'session_id', $session_id),
            'sumBasket' => App::call()->basketRepository->getSum($session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}