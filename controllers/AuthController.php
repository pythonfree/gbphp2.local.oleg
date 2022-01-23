<?php


namespace app\controllers;


class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (true) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die('Не верный логин пароль.');
        }
    }

    public function actionLogout()
    {

    }
}