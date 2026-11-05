<?php

namespace App\Models;

use App\Utils\Connection;

class Model extends Connection
{   
    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    public static function find($id)
    {

        // Lógica para buscar um registro pelo ID
    }

    public function all()
    {
        $this->connection = $this->getConnection();
        $stmt = $this->connection->prepare("SELECT * FROM {$this->table}");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function create($data)
    {
        // Lógica para criar um novo registro
    }

    public static function update($id, $data)
    {
        // Lógica para atualizar um registro existente
    }

    public static function delete($id)
    {
        // Lógica para excluir um registro existente
    }
}
