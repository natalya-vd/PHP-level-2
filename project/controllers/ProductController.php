<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\ProductsRepository;
use app\models\repositories\FeedbacksRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionCatalog()
    {
        $page = (new Request())->getParams()['page'] ?? 0;

        $catalog = (new ProductsRepository())->getLimit(($page + 1) * 4);

        echo $this->render('product/catalog', [
            'title' => 'Каталог',
            'catalog' => $catalog,
            'page' => ++$page,
            'feedbackList' => (new FeedbacksRepository())->getAll(),
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductsRepository())->getOne($id);

        echo $this->render('product/card', [
            'title' => 'Страница товара',
            'product' => $product,
            'feedbackList' => (new FeedbacksRepository())->getWhereAll('product_id', $id)
        ]);
    }
}