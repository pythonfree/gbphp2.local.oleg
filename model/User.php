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