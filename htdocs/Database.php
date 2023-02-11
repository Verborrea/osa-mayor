<?php

class Database
{
    public $connection;

    public function __construct()
    {
        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'epiz_33068761_agustina_db',
            'charset' => 'utf8mb4',
        ];

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        
        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = null)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        
        return $statement;
    }
}