<?php


namespace app\model;


use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;

    abstract public function getTableName();

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {
        $sql = "WHERE id = {$this->id}";
    }

}