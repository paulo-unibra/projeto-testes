<?php

namespace App\Routes;

use App\Utils\Response;

class Route extends Response
{
    public static function post($path, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }


    public static function get($path, $callback)
    {
        $url_requested = explode('/', $_SERVER['REQUEST_URI']);
        $url_defined = explode('/', $path);

        $path = self::handleSlug($url_defined, $url_requested);

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }

    public static function put($path, $callback)
    {
        $url_requested = explode('/', $_SERVER['REQUEST_URI']);
        $url_defined = explode('/', $path);

        $path = self::handleSlug($url_defined, $url_requested);

        if ($_SERVER['REQUEST_METHOD'] === 'PUT' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }

    public static function delete($path, $callback) 
    {
        $url_requested = explode('/', $_SERVER['REQUEST_URI']);
        $url_defined = explode('/', $path);

        $path = self::handleSlug($url_defined, $url_requested);

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && $_SERVER['REQUEST_URI'] === $path) {
            $callback();
        }
    }

    public static function handleSlug(array $url_defined, array $url_requested)
    {
        for ($i = 0; $i < count($url_defined); $i++) {
            if (strpos($url_defined[$i], ':') === 0) {
                $url_defined[$i] = $url_requested[$i];
            }
        }

        $path = implode('/', $url_defined);
        return $path;
    }
}
