<?php

namespace app\models;

class Users extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
        'role' => false,
    ];

    public function __construct($login = null, $pass = null, $hash = null, $role = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
    }

    public static function getTableName()
    {
        return 'users';
    }
}