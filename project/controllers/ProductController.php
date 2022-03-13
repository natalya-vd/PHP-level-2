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
        var_dump($catalog);

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
        var_dump($product);

        echo $this->render('product/card', [
            'title' => 'Страница товара',
            'product' => $product
        ]);
    }
}