<?php

class Http {
    public static $routes = [];

    //Método para manejar las solicitudes GET
    public static function get($url, $controllerMethod) {
        self::$routes['GET'][$url] = $controllerMethod;
    }

    //Método para manejar las solicitudes POST
    public static function post($url, $controllerMethod) {
        self::$routes['POST'][$url] = $controllerMethod;
    }

    //Método para manejar las solicitudes PUT
    public static function put($url, $controllerMethod) {
        self::$routes['PUT'][$url] = $controllerMethod;
    }

    //Método para manejar las solicitudes PATCH
    public static function patch($url, $controllerMethod) {
        self::$routes['PATCH'][$url] = $controllerMethod;
    }

    //Método para manejar las solicitudes DELETE
    public static function delete($url, $controllerMethod) {
        self::$routes['DELETE'][$url] = $controllerMethod;
    }

    //Método para enrutar la solicitud
    public static function route($url, $method) {
        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $routeUrl => $controllerMethod) {
                //Reemplazar las partes dinámicas
                $pattern = preg_replace('/\:id/', '(?P<id>\d+)', $routeUrl);
                $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';

                //Verificar si la URL coincide con el patrón
                if (preg_match($pattern, $url, $matches)) {
                    return [
                        'controller' => $controllerMethod['controller'],
                        'method' => $controllerMethod['method'],
                        'params' => isset($matches['id']) ? [$matches['id']] : []
                    ];
                }
            }
        }
        return ['controller' => 'ErrorController', 'method' => 'notFound'];
    }
}
