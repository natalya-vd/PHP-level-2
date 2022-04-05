<?php

namespace app\controllers;

use app\models\Products;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;

        $catalog = Products::getLimit(($page + 1) * 4);

        echo $this->render('product/catalog', [
            'title' => 'Каталог',
            'catalog' => $catalog,
            'page' => ++$page,
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Products::getOne($id);

        echo $this->render('product/card', [
            'title' => 'Страница товара',
            'product' => $product
        ]);
    }
}