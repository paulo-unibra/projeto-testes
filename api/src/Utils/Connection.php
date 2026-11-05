<?php

namespace App\Utils;
use App\Utils\Response;

use PDO;

abstract class Connection
{
    protected PDO $connection;
    public function __construct()
    {
        $config = [
            'connection' => 'mysql:host=localhost',
            'username' => 'paulo',
            'password' => 'root',
            'name' => 'viita',
            'options' => [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ];

        try {
            $this->connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
