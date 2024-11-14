<?php

namespace Ryan\DownloadFacil\Core;

class Route
{
    protected static $routes = [];

    // Método para registrar uma rota GET
    public static function get($uri, $controller)
    {
        self::$routes['GET'][$uri] = $controller;
    }

    // Método para registrar uma rota POST
    public static function post($uri, $controller)
    {
        self::$routes['POST'][$uri] = $controller;
    }

    // Método para processar a rota atual
    public static function dispatch()
    {
        $requestedUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestedUri = $requestedUri === '/' ? '/' : rtrim($requestedUri, '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Verifica se a rota e o método HTTP estão registrados
        if (isset(self::$routes[$requestMethod][$requestedUri])) {
            $controller = self::$routes[$requestMethod][$requestedUri];

            // Se for uma classe controladora com método
            if (is_array($controller)) {
                [$class, $method] = $controller;

                // Verifica se a classe e o método existem
                if (class_exists($class) && method_exists($class, $method)) {
                    $instance = new $class(); // Instanciando o controlador
                    $instance->$method();     // Chamando o método do controlador
                    exit;
                }
            } else {
                // Se for apenas um arquivo, inclui o arquivo como antes
                include $controller;
                exit;
            }
        }

        // Se a rota não for encontrada
        http_response_code(404);
        echo "Página não encontrada!";
    }
}
