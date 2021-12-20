<?php

namespace app\engine;

class Db
{

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8',
    ];

    protected $connection = null; //PDO

    protected function getConnection()
    {
        if (is_null($this->connection)) {
            print_r('Подключаюсь к БД...');
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password'],
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    protected function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset'],
        );
    }

    protected function query($sql, $params)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function queryOne($sql, $param)
    {
        return $this->query($sql, $param)->fetch();
    }

    public function queryAll($sql)
    {
        return $sql;
    }

    public function execute($sql)
    {
        echo 'Выполняю запрос без возврата набора, например, удаляю что-то...';
    }
}