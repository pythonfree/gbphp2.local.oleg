<?php


namespace app\controllers;


use app\model\repositories\UserRepository;
use app\engine\App;

class AuthController extends Controller
{
    public function actionLogin()
    {

        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->userRepository->auth($login, $pass)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die('Не верный логин пароль.');
        }
    }

    public function actionLogout()
    {
        App::call()->session->destroySession();
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}