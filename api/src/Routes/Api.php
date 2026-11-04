<?php

namespace App\Routes;

use App\Routes\Route;


class Api extends Route
{
    public static function routes()
    {
        self::get('/', function () {
            self::ok(['message' => 'API is working']);
        });

        // Autenticação
        self::post('/autenticar', function () {
            self::ok(['message' => 'Autenticação realizada com sucesso']);
        });
        self::post('/cadastrar', function () {
            self::ok(['message' => 'Cadastro realizado com sucesso']);
        });
        self::post('/desautenticar', function () {
            self::ok(['message' => 'Desautenticação realizada com sucesso']);
        });

        // instituicao
        self::get('/instituicao', function () {
            self::ok(['message' => 'Listagem de instituicao realizada com sucesso']);
        });
         self::get('/instituicao/:id', function () {
            self::ok(['message' => 'Detalhamento de instituicao realizada com sucesso']);
        });
        self::post('/instituicao', function () {
            self::ok(['message' => 'Cadastro de instituicao realizado com sucesso']);
        });
        self::put('/instituicao/:id', function () {
            self::ok(['message' => 'Atualização de instituicao realizada com sucesso']);
        });
        self::delete('/instituicao', function () {
            self::ok(['message' => 'Exclusão de instituicao realizada com sucesso']);
        });

       // usuario
        self::get('/usuario', function () {
            self::ok(['message' => 'Listagem de usuario realizada com sucesso']);
        });
         self::get('/usuario/:id', function () {
            self::ok(['message' => 'Detalhamento de usuario realizada com sucesso']);
        });
        self::post('/usuario', function () {
            self::ok(['message' => 'Cadastro de usuario realizado com sucesso']);
        });
        self::put('/usuario/:id', function () {
            self::ok(['message' => 'Atualização de usuario realizada com sucesso']);
        });
        self::delete('/usuario/:id', function () {
            self::ok(['message' => 'Exclusão de usuario realizada com sucesso']);
        }); 

        // endereco
        self::get('/endereco', function () {
            self::ok(['message' => 'Listagem de endereco realizada com sucesso']);
        });
         self::get('/endereco/:id', function () {
            self::ok(['message' => 'Detalhamento de endereco realizada com sucesso']);
        });
        self::post('/endereco', function () {
            self::ok(['message' => 'Cadastro de endereco realizado com sucesso']);
        });
        self::put('/endereco/:id', function () {
            self::ok(['message' => 'Atualização de endereco realizada com sucesso']);
        });
        self::delete('/endereco/:id', function () {
            self::ok(['message' => 'Exclusão de endereco realizada com sucesso']);
        });

        // consulta
        self::get('/consulta', function () {
            self::ok(['message' => 'Listagem de consulta realizada com sucesso']);
        });
         self::get('/consulta/:id', function () {
            self::ok(['message' => 'Detalhamento de consulta realizada com sucesso']);
        });
        self::post('/consulta/marcar', function () {
            self::ok(['message' => 'Marcação de consulta realizada com sucesso']);
        });
        self::delete('/consulta/desmarcar/:id', function () {
            self::ok(['message' => 'Desmarcação de consulta realizada com sucesso']);
        });
        self::put('/consulta/remarcar/:id', function () {
            self::ok(['message' => 'Remarcação de consulta realizada com sucesso']);
        });
    }
}
