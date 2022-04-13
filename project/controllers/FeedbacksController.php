<?php

namespace app\controllers;
use app\models\repositories\FeedbacksRepository;

class FeedbacksController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionFeedbacks()
    {
        echo $this->render('feedbacks', [
            'title' => 'Отзывы',
            'feedbackList' => (new FeedbacksRepository())->getAll()
        ]);
    }
}