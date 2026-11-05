<?php 

namespace App\Controllers;

class ConsultaController extends Controller
{
    public static function listar()
    {
        self::ok(['message' => 'Listagem realizada com sucesso']);
    }

    public static function detalhar()
    {
        self::ok(['message' => 'Detalhamento realizado com sucesso']);
    }


    public static function marcar()
    {
        self::ok(['message' => 'Marcação realizado com sucesso']);
    }

    public static function desmarcar()
    {   
        self::ok(['message' => 'Desmarcação realizada com sucesso']);
    }

    public static function remarcar()
    {
        self::ok(['message' => 'Remarcacao realizada com sucesso']);
    }
}