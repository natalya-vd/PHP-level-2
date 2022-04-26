<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Feedbacks;

class FeedbacksRepository extends Repository
{
    protected function getTableName()
    {
        return 'feedbacks';
    }

    protected function getEntityClass()
    {
        return Feedbacks::class;
    }
}