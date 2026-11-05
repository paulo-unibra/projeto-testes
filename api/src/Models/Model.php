<?php

namespace App\Models;

use App\Utils\Connection;

class Model extends Connection
{   
    protected $table;
    public $id;

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
        $stmt = $this->connection->prepare("SELECT * FROM {$this->table}");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create()
    {
        try {
            $params = get_object_vars($this); // $this;

            unset($params['connection'], $params['table']);

            $params = array_filter(
                $params,
                fn($value) => $value !== null && $value !== '*connection' && $value !== '*table'
            );

            $keys = implode(',', array_keys($params));

            $values = implode(',', array_fill(0, count($params), '?'));

            $sql = "INSERT INTO {$this->table} ($keys) VALUES ($values)";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($params));

            $this->id = $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
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
