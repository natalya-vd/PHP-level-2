<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Users;
use app\engine\Session;

class UsersRepository extends Repository
{
    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return Users::class;
    }

    public function auth($login, $pass) {
        $resultDb = $this->getWhere('login', $login);
        $session = new Session();

        if (password_verify($pass, $resultDb->pass)) {
            $session->setSession('login', $login);
            $session->setSession('id', $resultDb->id);
            return true;
        }
        return false;
    }

    public function isAuth() {
        $session = new Session();

        if(isset($_COOKIE["hash"]) && !isset($session->getSession()['login'])){
            $hash = $_COOKIE["hash"];

            $result = $this->getWhere('hash', $hash);
            $user = $result->login;
            
            if (!empty($user)) {
                $session->setSession('login', $user);
                $session->setSession('id', $result->id);
            }
        }  

        return isset($session->getSession()['login']);
    }

    public function getName() {
        return (new Session)->getSession()['login'];
    }
}