<?php



class Router
{
    protected static array $routes = [];

    /**
     * @param string $uri
     * @param array|callable $controller
     * @return void
     */
    public static function get(string $uri, array|callable $controller): void {
        self::$routes['GET'][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param array|callable $controller
     * @return void
     */
    public static function post(string $uri, array|callable $controller): void {
        self::$routes['POST'][$uri] = $controller;
    }

    public static function routes()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach (self::$routes[$requestMethod] as $uri => $controller) {
            $pattern = preg_replace('/\{[^\}]+\}/', '([a-zA-Z0-9_\-]+)', $uri);
            if (preg_match('#^' . $pattern . '$#', $requestUri, $matches)) {
                array_shift($matches); // Remove the full match
                if (is_callable($controller)) {
                    echo call_user_func_array($controller, $matches);
                } else {
                    [$class, $method] = $controller;

                    if (method_exists(new $class, $method)) {
                        echo call_user_func_array([new $class, $method], $matches);
                    } else {
                        throw new Exception('Method '. $method. ' not found');
                    }
                }
                return;
            }
        }

        http_response_code(404);
    }
}