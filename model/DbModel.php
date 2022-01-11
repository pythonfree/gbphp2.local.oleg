<?php


namespace app\model;


use app\engine\Db;

abstract class DbModel extends Model
{
    abstract public static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $params = [];
        $columns = [];
        $values = '';

        foreach ($this as $key => $value) {
            //TODO придумать, как задействовать только нужные поля
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update()
    {

    }

    public function delete()
    {
        $sql = "WHERE id = {$this->id}";
    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}