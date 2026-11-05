<?php

namespace App\Routes;

use App\Routes\Route;


class Api extends Route
{
    public static function routes()
    {
        self::get('/', function () {
            self::ok(['message' => 'Está funcionando... :)']);
        });

        // perfil
        self::post('/perfil', 'App\Controllers\PerfilController::cadastrar');


        // Autenticação
        self::post('/autenticar', 'App\Controllers\AutenticadorController::autenticar');
        self::post('/cadastrar', 'App\Controllers\AutenticadorController::cadastrar');
        self::post('/desautenticar', 'App\Controllers\AutenticadorController::desautenticar');

        // instituicao
        self::get('/instituicao', 'App\Controllers\InstituicaoController::listar');
        self::get('/instituicao/:id', 'App\Controllers\InstituicaoController::detalhar');
        self::post('/instituicao', 'App\Controllers\InstituicaoController::cadastrar');
        self::put('/instituicao/:id', 'App\Controllers\InstituicaoController::atualizar');
        self::delete('/instituicao/:id', 'App\Controllers\InstituicaoController::excluir');

        // usuario
        self::get('/usuario', 'App\Controllers\UsuarioController::listar');
        self::get('/usuario/:id', 'App\Controllers\UsuarioController::detalhar');
        self::post('/usuario', 'App\Controllers\UsuarioController::cadastrar');
        self::put('/usuario/:id', 'App\Controllers\UsuarioController::atualizar');
        self::delete('/usuario/:id', 'App\Controllers\UsuarioController::excluir');

   
        // endereco
        self::get('/endereco', 'App\Controllers\EnderecoController::listar');
        self::get('/endereco/:id', 'App\Controllers\EnderecoController::detalhar');
        self::post('/endereco', 'App\Controllers\EnderecoController::cadastrar');
        self::put('/endereco/:id', 'App\Controllers\EnderecoController::atualizar');
        self::delete('/endereco/:id', 'App\Controllers\EnderecoController::excluir');

        // consulta
        self::get('/consulta', 'App\Controllers\ConsultaController::listar');
        self::get('/consulta/:id', 'App\Controllers\ConsultaController::detalhar');
        self::post('/consulta/marcar', 'App\Controllers\ConsultaController::marcar');
        self::delete('/consulta/desmarcar/:id', 'App\Controllers\ConsultaController::desmarcar');
        self::put('/consulta/remarcar/:id', 'App\Controllers\ConsultaController::remarcar');
    }
}
