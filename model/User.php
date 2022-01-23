<?php


namespace app\model;


class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false,
    ];

    public static function auth($login, $pass)
    {
        $user = User::getWhere('login', $login);
    }

    public static function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    public static function getTableName()
    {
        return 'users';
    }

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

}