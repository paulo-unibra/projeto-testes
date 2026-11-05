<?php

namespace App\Models;

class Usuario extends Model
{
    protected string $table = 'usuarios';

    protected array $hidden = ['senha'];

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
