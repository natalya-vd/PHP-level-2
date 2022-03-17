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
    ];

    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    public static function auth($login, $pass) {
        $resultDb = static::getWhere('login', $login);

        if (password_verify($pass, $resultDb->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $resultDb->id;
            return true;
        }
        return false;
    }

    public static function isAuth() {
        if(isset($_COOKIE["hash"]) && !isset($_SESSION['login'])){
            $hash = $_COOKIE["hash"];
            
            $result = static::getWhere('hash', $hash);
            $user = $result->login;
            
            if (!empty($user)) {
                $_SESSION['login'] = $user;
                $_SESSION['id'] = $result->id;
            }
        }  

        return isset($_SESSION['login']);
    }

    public static function getName() {
        return $_SESSION['login'];
    }

    public static function getTableName()
    {
        return 'users';
    }
}