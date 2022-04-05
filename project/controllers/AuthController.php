<?php

namespace app\controllers;
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

        if(isset($_POST['login'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $save = isset($_POST['save']);

            $allow = Users::auth($login, $pass);
            if ($allow){
                if($save) {
                    $result = Users::getOne($_SESSION['id']);
                    $hash = uniqid(rand(), true);
                    $result->hash = $hash;
                    $result->save();
                    setcookie("hash", $hash, time() + 3600, '/');
                }
                header("Location: /?c=auth&a=login");
                die();
            } else {
                header("Location: /?c=auth&a=login&messageAuth=error");
                die();
            }
        }
        if(!$allow && $_GET['messageAuth']) {
            $messageError = $this->messageList[$_GET['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'allow' => $allow,
            'messageError' => $messageError
        ]);
    }

    public function actionLogout()
    {
        session_destroy();
        setcookie("hash", $_COOKIE["hash"], time() - 3600, '/');
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionRegistration()
    {
        $messageReg = null;

        if(isset($_POST['login_reg'])) {         
            if(empty($_POST['login_reg']) || empty($_POST['pass_reg'])) {
                header("Location: /?c=auth&a=registration&messageAuth=errorReg");
                die();
            } else {
                $login = $_POST['login_reg'];
                $pass = password_hash($_POST['pass_reg'], PASSWORD_DEFAULT);
                $hash = uniqid(rand(), true);

                $user = new Users($login, $pass, $hash);
                $user->save();

                header("Location: /?c=auth&a=registration&messageAuth=successReg");
                die();
            }
        }

        if($_GET['messageAuth']) {
            $messageReg = $this->messageList[$_GET['messageAuth']];
        }

        echo $this->render('auth', [
            'title' => 'Авторизация',
            'messageReg' => $messageReg
        ]);
    }
}