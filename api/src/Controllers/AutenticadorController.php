<?php
namespace App\Controllers;


class AutenticadorController extends Controller
{
    public static function autenticar()
    {
        self::ok(['message' => 'Autenticação realizada com sucesso']);
    }

    public static function desautenticar()
    {
        self::ok(['message' => 'Desautenticação realizada com sucesso']);
    }

    public static function cadastrar()
    {
        self::ok(['message' => 'Cadastro realizado com sucesso']);
    }
}