<?php

namespace App\Routes;
use App\Routes\Route;


class Api extends Route
{
    public static function routes()
    {
        self::ok(['message' => 'API is working']);
    }
}