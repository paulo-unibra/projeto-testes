<?php

namespace App\Utils;

use PDO;

abstract class Config extends Connection
{
    public function __construct()
    {

        parent::make([
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
        ]);
    }
}
