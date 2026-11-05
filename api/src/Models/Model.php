<?php

namespace App\Models;

use App\Utils\Connection;
use PDO;

class Model extends Connection
{
    protected string $table;
    public int | string  $id;
    protected array $existing;
    protected array $hidden;

    public function __construct()
    {
        parent::__construct();
    }

    public function find(int $id)
    {
        $smtp = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $smtp->execute(['id' => $id]);

        $response = $smtp->fetch();

        foreach ($this->hidden as $key) {
            unset($response[$key]);
        }

        return $response;
    }


    public function all($paginate = false, $limit = 10)
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($paginate) {
            $sql .= " LIMIT :limit";
        }

        $stmt = $this->connection->prepare($sql);

        if ($paginate) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();

        $data = $stmt->fetchAll();

        if ($paginate) {
            return [
                'data' => $data,
                'meta' => [
                    'total' => count($data),
                    'per_page' => $limit,
                    'current_page' => 1,
                    'last_page' => ceil(count($data) / $limit)
                ]
            ];
        }

        return $data;
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

    public function where($column, $value)
    {
        $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$column} = :value");
        $stmt->execute(['value' => $value]);

        $this->existing = $stmt->fetch();
        return $this;
    }

    public function exists()
    {
        return $this->existing;
    }
}
