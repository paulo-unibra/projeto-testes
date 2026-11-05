<?php

namespace App\Utils;

enum ResponseCode: int
{
    case OK = 200;
    case CREATED = 201;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case SERVER_ERROR = 500;
}

class Response
{
    public static function json($data, ResponseCode $status)
    {
        try {
            header('Content-Type: application/json');
            http_response_code($status->value);
            echo json_encode($data);
        } catch (\Exception $e) {
            http_response_code(ResponseCode::SERVER_ERROR->value);
            echo json_encode(['error' => 'json function needs receive two parameters, first parameter is the data to be returned and second parameter is the status code']);
        }
    }

    public static function ok($data)
    {
        self::json($data, ResponseCode::OK);
    }

    public static function created($data)
    {
        self::json($data, ResponseCode::CREATED);
    }

    public static function badRequest($data)
    {
        self::json($data, ResponseCode::BAD_REQUEST);
    }

    public static function unauthorized($data)
    {
        self::json($data, ResponseCode::UNAUTHORIZED);
    }

    public static function forbidden($data)
    {
        self::json($data, ResponseCode::FORBIDDEN);
    }

    public static function notFound($data)
    {
        self::json($data, ResponseCode::NOT_FOUND);
    }


    public static function serverError($data)
    {
        self::json($data, ResponseCode::SERVER_ERROR);
    }
}
