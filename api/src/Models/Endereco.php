<?php

namespace App\Models;

class Endereco extends Model
{
    protected $table = 'enderecos';

    public string $cep;

    public string $logradouro;

    public string $bairro;

    public string $estado;

    public string $cidade;

    public string $numero;

    public string $complemento;

    public string $criado_em;

    public string $atualizado_em;

    public string $apagado_em;
}
