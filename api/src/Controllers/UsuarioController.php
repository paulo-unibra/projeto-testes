<?php 

namespace App\Controllers;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public static function listar()
    {   
        $usuario = new Usuario();
        $usuarios = $usuario->all();

        self::ok(['message' => 'Listagem realizada com sucesso']);
    }

    public static function detalhar()
    {
        self::ok(['message' => 'Detalhamento realizado com sucesso']);
    }

    public static function cadastrar()
    {

        $usuario = new Usuario();

        $usuario->nome = 'Paulo Ricardo';
        $usuario->email = 'pr838908@gmail.com';
        $usuario->senha = '@@123Mudar';
        $usuario->create();
        // $usuario->save();

        


        // self::ok(['message' => 'Cadastro realizado com sucesso']);
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