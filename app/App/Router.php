<?php

namespace Nuazsa\Simplemvc\App;

class Router 
{
    private static array $routes = [];

    public static function add(string $method,string  $path,string  $controller,string  $function, array $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares
        ];
    }

    public static function run() : void 
    {
        $path = '/';

        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {

            $pattern = "#^" . $route["path"] . "$#";

            if (preg_match($pattern, $path, $variable) && $route['method'] == $method) {

                foreach ($route['middlewares'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }
    
                $controller = new $route['controller'];
                $function = $route['function'];

                array_shift($variable);
                call_user_func_array([$controller, $function], $variable);

                return;
            }
        }

        http_response_code(404);
        echo "Controller not found";
    }
}