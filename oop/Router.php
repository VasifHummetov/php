<?php

use vendor\Request;

class Router
{
    protected static array $routes = [];

    /**
     * @param string $uri
     * @param array|callable $controller
     * @return void
     */
    public static function get(string $uri, array|callable $controller): void
    {
        self::$routes['GET'][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param array|callable $controller
     * @return void
     */
    public static function post(string $uri, array|callable $controller): void
    {
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
                    $reflectionFunction = new ReflectionFunction($controller);

                    $parameters = $reflectionFunction->getParameters();

                    foreach ($parameters as $parameter) {

                        if ($parameter->getType()) {
                            $request = new ($parameter->getType()->getName());

                            if ($request instanceof Request) {
                                array_unshift($matches, Request::capture());
                            }
                        }
                    }

                    if (is_array($reflectionFunction->invokeArgs($matches))) {
                        header('Content-type: application/json');
                        echo json_encode($reflectionFunction->invokeArgs($matches));
                    } else {
                        echo $reflectionFunction->invokeArgs($matches);
                    }
                } else {
                    [$class, $method] = $controller;

                    $reflectionClass = new ReflectionClass($class);

                    if ($reflectionClass->hasMethod($method)) {
                        $reflectionMethod = $reflectionClass->getMethod($method);

                        $parameters = $reflectionMethod->getParameters();

                        foreach ($parameters as $parameter) {
                            $request = $parameter->getType()->getName();

                            if ($request === Request::class) {
                                array_unshift($matches, Request::capture());
                            }
                        }

                        if (is_array($reflectionMethod->invokeArgs(new $class, $matches))) {
                            header('Content-type: application/json');
                            echo json_encode($reflectionMethod->invokeArgs(new $class, $matches));
                        } else {
                            echo $reflectionMethod->invokeArgs(new $class, $matches);
                        }
                    } else {
                        throw new Exception($method . " not found");
                    }
                }
                return;
            }
        }

        http_response_code(404);
    }
}