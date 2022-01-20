<?php


namespace app\model;


use app\interfaces\IModel;

abstract class Model implements IModel
{

    protected $props = [];

    public function __set($name, $value)
    {
        //TODO проверить по props можно ли вообще менять это поле
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}