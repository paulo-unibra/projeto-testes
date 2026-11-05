<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Endereco;

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
        try {
            $endereco = new Endereco();

            $endereco->logradouro = 'Rua 1';
            $endereco->numero = '123';
            $endereco->bairro = 'Bairro 1';
            $endereco->cidade = 'Cidade 1';
            $endereco->estado = 'PE';
            $endereco->cep = '12345678';

            $endereco->create(['trx' => true]);

            $usuario = new Usuario();

            $usuario->nome = 'Paulo Ricardo';
            $usuario->email = 'pr838908@gmail.com';
            $usuario->senha = '@@123Mudar';
            $usuario->endereco_id = $endereco->id;
            $usuario->usuario_perfil_id = 1;
            $usuario->create();

            self::ok(['message' => 'Cadastro realizado com sucesso']);
        } catch (\Exception $th) {
            echo 1;
            self::serverError(['message' => 'Erro ao cadastrar usuário: ' . $th->getMessage()]);
        }
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
