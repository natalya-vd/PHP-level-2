<?php

namespace app\controllers;

use app\engine\App;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionCatalog()
    {
        $page = App::call()->request->getParams()['page'] ?? 0;

        $catalog = App::call()->productsRepository->getLimit(($page + 1) * 4);

        echo $this->render('product/catalog', [
            'title' => 'Каталог',
            'catalog' => $catalog,
            'page' => ++$page,
            'feedbackList' => App::call()->feedbacksRepository->getAll(),
        ]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->productsRepository->getOne($id);

        echo $this->render('product/card', [
            'title' => 'Страница товара',
            'product' => $product,
            'feedbackList' => App::call()->feedbacksRepository->getWhereAll('product_id', $id)
        ]);
    }
}