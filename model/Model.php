<?php


namespace app\model;


use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        //TODO if ($name == $id) ..... запретить
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}