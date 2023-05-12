<?php

namespace Lib;

class Route
{
    private static $routes = [];

    public static function get($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    public static function delete($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['DELETE'][$uri] = $callback;
    }

    public static function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('?', $uri); // Obtener la URI sin los parámetros de consulta
        $uri = trim($uriParts[0], '/');
        $query = isset($uriParts[1]) ? $uriParts[1] : '';

        // echo $uri;

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {

            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z]+)', $route);
                // echo $route;
            }

            //parametros en la ruta
            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                // Parsear los parámetros de consulta y agregarlos a la lista de parámetros
                parse_str($query, $queryParams);
                $params[] = $queryParams;

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response; //cadena
                }

                return;
            }
        }

        echo "404 Not found"; // si no ha encontrado la ruta
    }
}
