<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Products;
use app\models\Feedbacks;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionCatalog()
    {
        $page = (new Request())->getParams()['page'] ?? 0;

        $catalog = Products::getLimit(($page + 1) * 4);

        echo $this->render('product/catalog', [
            'title' => 'Каталог',
            'catalog' => $catalog,
            'page' => ++$page,
            'feedbackList' => Feedbacks::getAll(),
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = Products::getOne($id);

        echo $this->render('product/card', [
            'title' => 'Страница товара',
            'product' => $product,
            'feedbackList' => Feedbacks::getWhereAll('product_id', $id)
        ]);
    }
}