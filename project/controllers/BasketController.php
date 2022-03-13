<?php

namespace app\controllers;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionBasket()
    {
        $basket = Basket::getBasket();

        echo $this->render('basket', [
            'title' => 'Корзина',
            'basket' => $basket
        ]);
    }
}