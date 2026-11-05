<?php 

namespace App\Controllers;

class InstituicaoController extends Controller
{
    public static function listar()
    {
        self::ok(['message' => 'Listagem realizada com sucesso']);
    }
}