<?php 

namespace App\Controllers;

class EnderecoController extends Controller
{
    public static function listar()
    {
        self::ok(['message' => 'Listagem realizada com sucesso']);
    }

    public static function detalhar()
    {
        self::ok(['message' => 'Detalhamento realizado com sucesso']);
    }

    public static function cadastrar()
    {
        self::ok(['message' => 'Cadastro realizado com sucesso']);
    }

    public static function atualizar()
    {   
        self::ok(['message' => 'Atualização realizada com sucesso']);
    }

    public static function excluir()
    {
        self::ok(['message' => 'Exclusão realizada com sucesso']);
    }
}