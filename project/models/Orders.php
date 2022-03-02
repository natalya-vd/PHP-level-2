<?php

namespace app\models;

class Orders extends Model
{
    public $id;
    public $session_id;
    public $phone;
    public $name_user;
    public $users_id;
    public $status;

    public function __construct($session_id = null, $phone = null, $name_user = null, $users_id = null, $status = null)
    {
        $this->session_id = $session_id;
        $this->phone = $phone;
        $this->name_user = $name_user;
        $this->users_id = $users_id;
        $this->status = $status;
    }

    public function getTableName()
    {
        return 'orders';
    }
}