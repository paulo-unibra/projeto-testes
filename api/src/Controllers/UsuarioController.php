<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Endereco;
use App\Utils\Validator;
use Illuminate\Database\Capsule\Manager as DB;

class UsuarioController extends Controller
{
    public static function listar($id, $request)
    {
        $usuario = new Usuario();
        $usuario->query();

        if ($id || $request['id']) {
            $usuario = $usuario->where('id', '=', $request['id']);
        }

        if ($request['nome']) {
            $usuario = $usuario->where('nome', 'like', "%" . $request['nome'] . "%");
        }

        if ($request['email']) {
            $usuario = $usuario->where('email', 'like', "%" . $request['email'] . "%");
        }

        if ($request['telefone']) {
            $usuario = $usuario->where('telefone', 'like', "%" . $request['telefone'] . "%");
        }

        $usuarios = $usuario->paginate();

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

        DB::beginTransaction();

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

            $endereco = $endereco->create([
                'cep' => $request['endereco']['cep'],
                'logradouro' => $request['endereco']['logradouro'],
                'bairro' => $request['endereco']['bairro'],
                'estado' => $request['endereco']['estado'],
                'cidade' => $request['endereco']['cidade'],
                'numero' => $request['endereco']['numero'],
            ]);

            $usuario = new Usuario([
                'email' => $request['email'],
                'nome' => $request['nome'],
                'telefone' => $request['telefone'],
                'senha' => password_hash($request['senha'], PASSWORD_DEFAULT),
                'endereco_id' => $endereco->id,
                'usuario_perfil_id' => 1
            ]);

            DB::commit();

            self::ok(['message' => 'Cadastro realizado com sucesso']);
        } catch (\Exception $th) {
            DB::rollBack();
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
