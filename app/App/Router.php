<?php

namespace Nuazsa\Simplemvc\App;

/**
 * The Router class handles routing for the application.
 *
 * It allows defining routes that map URLs to controller actions.
 */
class Router
{
    /**
     * Array to store the defined routes.
     * @var array
     */
    private static array $routes = [];

    /**
     * Array to store route prefixes.
     * @var array
     */
    private static array $prefixes = [];

    /**
     * Get the full path including prefixes.
     *
     * @param string $path The path to be prefixed.
     * @return string The full path including prefixes.
     */
    private static function getPath(string $path): string
    {
        $prefix = implode('', self::$prefixes);
        return $prefix . $path;
    }

    /**
     * Add a new route to the router.
     *
     * @param string $method The HTTP method for the route (GET, POST, etc.).
     * @param string $path The URL path for the route.
     * @param string $controller The controller class name.
     * @param string $function The method in the controller to call.
     * @param array $middlewares An array of middleware classes to be executed before the route.
     * @return void
     */
    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => self::getPath($path),
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares
        ];
    }

    /**
     * Add a new GET route to the router.
     *
     * @param string $path The URL path for the route.
     * @param string $controller The controller class name.
     * @param string $function The method in the controller to call.
     * @param array $middlewares An array of middleware classes to be executed before the route.
     * @return void
     */
    public static function get(string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::add('GET', $path, $controller, $function, $middlewares);
    }

    /**
     * Add a new POST route to the router.
     *
     * @param string $path The URL path for the route.
     * @param string $controller The controller class name.
     * @param string $function The method in the controller to call.
     * @param array $middlewares An array of middleware classes to be executed before the route.
     * @return void
     */
    public static function post(string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::add('POST', $path, $controller, $function, $middlewares);
    }

    /**
     * Add a route prefix.
     *
     * @param string $prefix The prefix to add to the routes.
     * @param callable $callback The callback function to define routes within the prefix.
     * @return void
     */
    public static function prefix(string $prefix, callable $callback): void
    {
        self::$prefixes[] = $prefix;
        $callback();
        array_pop(self::$prefixes);
    }

    /**
     * Run the router to handle incoming requests.
     *
     * This method matches the current request URL and method to the defined routes
     * and calls the corresponding controller method.
     *
     * If no matching route is found, it returns a 404 response.
     *
     * @return void
     */
    public static function run(): void
    {
        $path = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route["path"] . "$#";

            if (preg_match($pattern, $path, $matches) && $route['method'] === $method) {
                foreach ($route['middlewares'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }

                $controller = new $route['controller'];
                $function = $route['function'];

                array_shift($matches); // Remove the full match
                call_user_func_array([$controller, $function], $matches);
                return;
            }
        }

        http_response_code(404);
        echo "Controller not found";
    }
}
