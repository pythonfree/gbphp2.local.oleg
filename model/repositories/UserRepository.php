<?php


namespace app\model\repositories;


use app\model\entities\User;
use app\model\Repository;
use app\engine\App;

class UserRepository extends Repository
{
    public function auth($login, $pass): bool
    {
        $user = $this->getWhere('login', $login);

        if (password_verify($pass, $user->pass)) {
            App::call()->session->setSession('login', $login);
            //$_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public function getName()
    {
        return $_SESSION['login'] ?? null;
    }

    public function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return User::class;
    }
}