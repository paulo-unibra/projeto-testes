<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // protected string $table = 'usuarios';
    protected $table = 'usuarios';

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
    const DELETED_AT = 'apagado_em';

    protected $fillable = ['nome', 'endereco_id', 'telefone', 'data_cadastro', 'email', 'senha', 'usuario_perfil_id'];

    protected $hidden = ['senha'];

    public string $nome;

    public int $endereco_id;

    public string $telefone;

    public string $data_cadastro;

    public string $email;

    public string $senha;

    public int $usuario_perfil_id;

    public string $criado_em;

    public string $atualizado_em;

    public string $apagado_em;
}
