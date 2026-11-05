<?php

namespace App\Models;

use App\Utils\Connection;

class Model extends Connection
{
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
        print_r($this->getConnection());
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
