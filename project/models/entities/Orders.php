<?php

namespace app\models\entities;

use app\models\Entity;

class Orders extends Entity
{
    protected $id;
    protected $session_id;
    protected $phone;
    protected $name_user;
    protected $users_id;
    protected $status;

    protected $props = [
        'session_id' => false,
        'phone' => false,
        'name_user' => false,
        'users_id' => false,
        'status' => false,
    ];

    public function __construct($session_id = null, $phone = null, $name_user = null, $users_id = null, $status = null)
    {
        $this->session_id = $session_id;
        $this->phone = $phone;
        $this->name_user = $name_user;
        $this->users_id = $users_id;
        $this->status = $status;
    }
}