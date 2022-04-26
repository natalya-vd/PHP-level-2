<?php

namespace app\models;

use app\engine\Session;

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
        $session = new Session();

        if (password_verify($pass, $resultDb->pass)) {
            $session->setSession('login', $login);
            $session->setSession('id', $resultDb->id);
            return true;
        }
        return false;
    }

    public static function isAuth() {
        $session = new Session();

        if(isset($_COOKIE["hash"]) && !isset($session->getSession()['login'])){
            $hash = $_COOKIE["hash"];

            $result = static::getWhere('hash', $hash);
            $user = $result->login;
            
            if (!empty($user)) {
                $session->setSession('login', $user);
                $session->setSession('id', $result->id);
            }
        }  

        return isset($session->getSession()['login']);
    }

    public static function getName() {
        return (new Session)->getSession()['login'];
    }

    public static function getTableName()
    {
        return 'users';
    }
}