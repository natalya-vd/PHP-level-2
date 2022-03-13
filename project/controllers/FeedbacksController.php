<?php

namespace app\controllers;
use app\models\Feedbacks;

class FeedbacksController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
    
    public function actionFeedbacks()
    {
        $feedback = Feedbacks::getAll();

        echo $this->render('feedbacks', [
            'title' => 'Отзывы',
            'feedback' => $this->renderTemplate('modules/feedback', [
            'feedbackList' => $feedback
        ])
    ]);
    }
}