<?php


namespace app\controllers;


use app\engine\Request;
use app\model\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];

        if ((new UserRepository())->auth($login, $pass)) {
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