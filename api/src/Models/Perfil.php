<?php

namespace App\Models;

class Perfil extends Model
{
    protected $table = 'usuario_perfil';

    public string $patente;

    public string $criado_em;

    public string $atualizado_em;
}
