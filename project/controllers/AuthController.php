<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Users;

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

        if(isset(App::call()->request->getParams()['login'])) {
            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            $save = isset(App::call()->request->getParams()['save']);

            $allow = App::call()->usersRepository->auth($login, $pass);

            if ($allow){
                if($save) {
                    $result = App::call()->usersRepository->getOne(App::call()->session->getSession()['id']);
                    $hash = uniqid(rand(), true);
                    $result->hash = $hash;
                    App::call()->usersRepository->save($result);
                    setcookie("hash", $hash, time() + 3600, '/');
                }
                header("Location: /auth/login");
                die();
            } else {
                header("Location: /auth/login/?messageAuth=error");
                die();
            }
        }

        if(!$allow && App::call()->request->getParams()['messageAuth']) {
            $messageError = $this->messageList[App::call()->request->getParams()['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'allow' => $allow,
            'messageError' => $messageError
        ]);
    }

    public function actionLogout()
    {
        App::call()->session->sessionDestroy();
        setcookie("hash", $_COOKIE["hash"], time() - 3600, '/');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionRegistration()
    {
        $messageReg = null;

        if(isset(App::call()->request->getParams()['login_reg'])) {         
            if(empty(App::call()->request->getParams()['login_reg']) || empty(App::call()->request->getParams()['pass_reg'])) {
                header("Location: /auth/registration/?messageAuth=errorReg");
                die();
            } else {
                $login = App::call()->request->getParams()['login_reg'];
                $pass = password_hash(App::call()->request->getParams()['pass_reg'], PASSWORD_DEFAULT);
                $hash = uniqid(rand(), true);

                $user = new Users($login, $pass, $hash);
                App::call()->usersRepository->save($user);

                header("Location: /auth/registration/?messageAuth=successReg");
                die();
            }
        }

        if(App::call()->request->getParams()['messageAuth']) {
            $messageReg = $this->messageList[App::call()->request->getParams()['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'messageReg' => $messageReg
        ]);
    }
}