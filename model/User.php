<?php


namespace app\model;


class User extends DbModel
{
    public $id;
    public $login;
    public $pass;

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