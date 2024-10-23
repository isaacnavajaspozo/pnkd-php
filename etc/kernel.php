<?php

require_once('./etc/http.php');
require_once('./srv/routers/web.php');


class Kernel {

    public function __construct() {
        $this->env();
        $this->errores();
    }

    // Ejecutar la aplicación y la lógica del router
    public function coreRouter() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $route = Http::route($url, $method);
        if (!$route) {
            http_response_code(404);
            echo "Route not found";
            exit;
        }

        $controllerName = $route['controller'];
        $method = $route['method'];

        if (!class_exists($controllerName)) {
            http_response_code(500);
            echo "Controller class not found";
            exit;
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            http_response_code(500);
            echo "Method not found in controller";
            exit;
        }

        $params = isset($route['params']) ? $route['params'] : [];
        call_user_func_array([$controller, $method], $params);
    }

    // función para cargar helpers
    public function loadHelper($ruta) {
        if ($ruta) {
            require_once('./etc/ORM/helpers/' . $ruta);
        }
    }

    // función para la funcionalidad del .env
    public function env() {
        $env_file = './tmp/.env';
        if (file_exists($env_file)) {
            $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0)
                    continue; // Saltar comentarios
                list($key, $value) = explode('=', $line, 2);
                putenv("$key=$value");
            }
        } else {
            echo "Error: No se encontró el archivo .env";
        }
    }

    /*Funciones para mostrar debugger*/
    public function mostrar_errores($errno, $errstr, $errfile, $errline) {
        echo '<div style="background-color: #FFDDDD; border: 1px solid #FF0000; padding: 10px; margin-bottom: 10px;">';
        echo '<strong>Error:</strong> [' . $errno . '] ' . $errstr . '<br>';
        echo '<strong>Archivo:</strong> ' . $errfile . '<br>';
        echo '<strong>Línea:</strong> ' . $errline . '<br>';
        echo '</div>';
    }

    public function manejar_excepciones($exception) {
        echo '<div style="background-color: #FFDDDD; border: 1px solid #FF0000; padding: 10px; margin-bottom: 10px;">';
        echo '<strong>Excepción no capturada:</strong> ' . $exception->getMessage() . '<br>';
        echo '<strong>Archivo:</strong> ' . $exception->getFile() . '<br>';
        echo '<strong>Línea:</strong> ' . $exception->getLine() . '<br>';
        echo '</div>';
    }

    public function manejar_errores_fatales() {
        $error = error_get_last();
        if ($error !== NULL) {
            echo '<div style="background-color: #FFDDDD; border: 1px solid #FF0000; padding: 10px; margin-bottom: 10px;">';
            echo '<strong>Error fatal:</strong> [' . $error['type'] . '] ' . $error['message'] . '<br>';
            echo '<strong>Archivo:</strong> ' . $error['file'] . '<br>';
            echo '<strong>Línea:</strong> ' . $error['line'] . '<br>';
            echo '</div>';
        }
    }

    public function errores() {
        if (getenv('ERRORS') === 'true') {
            set_error_handler([$this, 'mostrar_errores']);
            set_exception_handler([$this, 'manejar_excepciones']);
            register_shutdown_function([$this, 'manejar_errores_fatales']);

            require_once('./etc/ORM/helpers/debug.php');
        }
    }


}

?>