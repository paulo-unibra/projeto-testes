<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'estado',
        'cidade',
        'numero',
        'complemento',
    ];

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
