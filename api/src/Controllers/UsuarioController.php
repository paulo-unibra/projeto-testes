<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Endereco;
use App\Utils\Validator;

class UsuarioController extends Controller
{
    public static function listar($id, $request)
    {
        $usuario = new Usuario();

        $usuario = $usuario->query();
        // if ($id) {
        //     $usuario = $usuario->where('id', $id);
        // }

        // if ($request['nome']) {
        //     $usuario = $usuario->whereLike('nome', "%$request%");
        // }   

        // if ($request['email']) {
        //     $usuario = $usuario->whereLike('email', "%$request%");
        // }

        // if ($request['telefone']) {
        //     $usuario = $usuario->whereLike('telefone', "%$request%");
        // }



        $usuarios = $usuario->get();



        self::ok($usuarios);
    }


    public static function detalhar($id)
    {
        try {
            $usuario = new Usuario();
            $usuario = $usuario->find($id);

            if ($usuario) {

                self::ok(['usuario' => $usuario]);
            } else {
                self::notFound(['message' => 'Usuário não encontrado']);
            }
        } catch (\Exception $e) {
            self::serverError($e->getMessage());
        }
    }

    public static function cadastrar($request)
    {
        try {
            Validator::validate($request, [
                'email' => ['email' => 'Email inválido', 'unique|App\Models\Usuario' => 'Email já cadastrado', 'required' => 'Email é obrigatório'],
                'nome' => ['required' => 'Nome é obrigatório'],
                'senha' => ['required' => 'Senha é obrigatória'],
                'telefone' => ['max:11' => 'Telefone deve ter no máximo 11 caracteres'],
                'endereco.cep' => ['required' => 'CEP é obrigatório', 'max:8' => 'CEP deve ter no máximo 8 caracteres'],
                'endereco.logradouro' => ['required' => 'Logradouro é obrigatório', 'max:100' => 'Logradouro deve ter no máximo 100 caracteres'],
                'endereco.bairro' => ['required' => 'Bairro é obrigatório', 'max:100' => 'Bairro deve ter no máximo 100 caracteres'],
                'endereco.estado' => ['required' => 'Estado é obrigatório', 'max:2' => 'Estado deve ter no máximo 2 caracteres'],
                'endereco.cidade' => ['required' => 'Cidade é obrigatório', 'max:100' => 'Cidade deve ter no máximo 100 caracteres'],
                'endereco.numero' => ['required' => 'Número é obrigatório', 'max:10' => 'Número deve ter no máximo 10 caracteres'],
            ]);

            if (Validator::hasErrors()) {
                return self::badRequest(Validator::getErrors());
            }

            $endereco = new Endereco();

            $endereco->cep = $request['endereco']['cep'];
            $endereco->logradouro = $request['endereco']['logradouro'];
            $endereco->bairro = $request['endereco']['bairro'];
            $endereco->estado = $request['endereco']['estado'];
            $endereco->cidade = $request['endereco']['cidade'];
            $endereco->numero = $request['endereco']['numero'];

            $endereco->create();

            $usuario = new Usuario();

            $usuario->email = $request['email'];
            $usuario->nome = $request['nome'];
            $usuario->telefone = $request['telefone'];
            $usuario->senha = password_hash($request['senha'], PASSWORD_DEFAULT);

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
