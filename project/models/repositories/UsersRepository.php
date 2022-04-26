<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Users;
use app\engine\App;

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
        $session = App::call()->session;

        if (password_verify($pass, $resultDb->pass)) {
            $session->setSession('login', $login);
            $session->setSession('id', $resultDb->id);
            return true;
        }
        return false;
    }

    public function isAuth() {
        $session = App::call()->session;

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
        return App::call()->session->getSession()['login'];
    }

    function checkRole()
    {
        $login = App::call()->session->getSession()['login'];
        $tableName = $this->getTableName();

        $sql = "SELECT role FROM $tableName WHERE `login` = :login";

        $role = App::call()->db->queryOne($sql, ['login' => $login])['role'];

        if($role === 'admin') {
            return true;
        }

        return false;
    }
}