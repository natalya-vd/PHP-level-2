<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\Users;

class AuthController extends Controller
{
    private $messageList = [
        'error' => 'Неверный логин или пароль! Пароль 123 :)',
        'errorReg' => 'Для регистрации нужно заполнить оба поля',
        'successReg' => 'Вы успешно зарегистрированы! Для входа на сайт заполните форму справа.'
    ];

    public function actionLogin()
    {
        $allow = false;
        $messageError = null;

        $request = new Request();

        if(isset($request->getParams()['login'])) {
            $login = $request->getParams()['login'];
            $pass = $request->getParams()['pass'];
            $save = isset($request->getParams()['save']);

            $allow = Users::auth($login, $pass);

            if ($allow){
                if($save) {
                    $result = Users::getOne((new Session)->getSession()['id']);
                    $hash = uniqid(rand(), true);
                    $result->hash = $hash;
                    $result->save();
                    setcookie("hash", $hash, time() + 3600, '/');
                }
                header("Location: /auth/login");
                die();
            } else {
                header("Location: /auth/login/?messageAuth=error");
                die();
            }
        }

        if(!$allow && $request->getParams()['messageAuth']) {
            $messageError = $this->messageList[$request->getParams()['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'allow' => $allow,
            'messageError' => $messageError
        ]);
    }

    public function actionLogout()
    {
        $session = new Session();
        $session->sessionDestroy();
        setcookie("hash", $_COOKIE["hash"], time() - 3600, '/');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionRegistration()
    {
        $messageReg = null;
        $request = new Request();

        if(isset($request->getParams()['login_reg'])) {         
            if(empty($request->getParams()['login_reg']) || empty($request->getParams()['pass_reg'])) {
                header("Location: /auth/registration/?messageAuth=errorReg");
                die();
            } else {
                $login = $request->getParams()['login_reg'];
                $pass = password_hash($request->getParams()['pass_reg'], PASSWORD_DEFAULT);
                $hash = uniqid(rand(), true);

                $user = new Users($login, $pass, $hash);
                $user->save();

                header("Location: /auth/registration/?messageAuth=successReg");
                die();
            }
        }

        if($request->getParams()['messageAuth']) {
            $messageReg = $this->messageList[$request->getParams()['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'messageReg' => $messageReg
        ]);
    }
}