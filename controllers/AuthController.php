<?php


namespace app\controllers;


use app\model\User;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (User::auth($login, $pass)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die('Не верный логин пароль.');
        }
    }

    public function actionLogout()
    {
        session_destroy();
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}