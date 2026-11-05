<?php

namespace App\Controllers;

use App\Models\Perfil;

class PerfilController extends Controller
{
    public static function listar()
    {
        $perfis = new Perfil();
        $perfis = $perfis->all();

        self::ok(['message' => $perfis]);
    }

    public static function detalhar()
    {
        self::ok(['message' => 'Detalhamento realizado com sucesso']);
    }

    public static function cadastrar()
    {
        try {
            $perfis = [
                'Administrador',
                'Médico',
                'Paciente',
            ];

            foreach ($perfis as $perfil) {
                $perfilModel = new Perfil();
                $perfilModel->patente = $perfil;
                $perfilModel->create();
            }

            self::ok(['message' => 'Cadastro realizado com sucesso']);
        } catch (\Exception $th) {
            echo 1;
            self::serverError(['message' => 'Erro ao cadastrar usuário: ' . $th->getMessage()]);
        }
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
