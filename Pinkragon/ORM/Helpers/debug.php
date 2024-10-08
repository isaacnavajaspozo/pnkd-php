<?php

class Debug extends stdClass {
    // Método de depuración estático
    public static function kill($parametro = null) {
        if (getenv('ERRORS') === 'false') {
            return false;
        }
        echo "Modo Debug::kill activado:";
        echo "<pre>";
        if (is_null($parametro)) {
            echo "El valor de  NULL\n";
            var_dump($parametro);
        } elseif (is_bool($parametro)) {
            echo "El valor es booleano: " . ($parametro ? "TRUE" : "FALSE") . "\n";
            var_dump($parametro);
        } elseif (is_int($parametro)) {
            echo "El valor es un entero: $parametro\n";
            var_dump($parametro);
        } elseif (is_float($parametro)) {
            echo "El valor es un flotante: $parametro\n";
            var_dump($parametro);
        } elseif (is_string($parametro)) {
            echo "El valor es una cadena: $parametro\n";
            var_dump($parametro);
        } elseif (is_array($parametro)) {
            echo "El valor es un array:\n";
            print_r($parametro);
        } elseif (is_object($parametro)) {
            echo "El valor es un objeto de la clase " . get_class($parametro) . ":\n";
            print_r($parametro);
        } elseif (is_resource($parametro)) {
            echo "El valor es un recurso: " . get_resource_type($parametro) . "\n";
            var_dump($parametro);
        } else {
            echo "El tipo de dato es desconocido\n";
        }
        echo "</pre>";
        die();
    }
}
