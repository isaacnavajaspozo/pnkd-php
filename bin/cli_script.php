<?php

// Asegúrate de que el script se ejecute desde la línea de comandos
if (php_sapi_name() !== 'cli') {
    die("Este script solo se puede ejecutar desde la línea de comandos.\n");
}

// Función para calcular el tamaño de una carpeta
function tamañoCarpeta($ruta) {
    $total = 0;

    // Verifica si la ruta es un directorio
    if (is_dir($ruta)) {
        // Escanea el directorio y obtiene todos los archivos
        $archivos = scandir($ruta);

        foreach ($archivos as $archivo) {
            // Ignora los directorios . y ..
            if ($archivo !== '.' && $archivo !== '..') {
                $rutaArchivo = $ruta . '/' . $archivo;
                // Si es un directorio, llama recursivamente
                if (is_dir($rutaArchivo)) {
                    $total += tamañoCarpeta($rutaArchivo);
                } else {
                    // Si es un archivo, suma su tamaño
                    $total += filesize($rutaArchivo);
                }
            }
        }
    }

    return $total;
}

// Función para obtener permisos de un archivo o carpeta
function obtenerPermisos($ruta) {
    return substr(sprintf('%o', fileperms($ruta)), -4);
}

// Función para mostrar todos los recursos del servidor en formato tabla
function mostrarRecursos() {
    echo "Recursos del servidor:\n";
    echo str_repeat('-', 40) . "\n";
    echo "Sistema operativo: " . PHP_OS . "\n";
    echo "Versión de PHP: " . phpversion() . "\n";
    echo "Archivos en el directorio actual:\n";

    // Crear cabecera de la tabla
    echo "\n" . str_pad("Nombre", 30) . str_pad("Tamaño", 15) . str_pad("Permisos", 10) . "\n";
    echo str_repeat('-', 55) . "\n";

    // Listar archivos del directorio actual
    //$directorioActual = getcwd();
    $directorioActual = "/";
    $archivos = scandir($directorioActual);

    foreach ($archivos as $archivo) {
        if ($archivo !== '.' && $archivo !== '..') {
            // Obtener el tamaño de la carpeta o archivo
            $tamaño = tamañoCarpeta($directorioActual . '/' . $archivo);
            $tamañoFormateado = formatearTamaño($tamaño);
            $permisos = obtenerPermisos($directorioActual . '/' . $archivo);

            // Imprimir cada fila de la tabla
            echo str_pad($archivo, 30) . str_pad($tamañoFormateado, 15) . str_pad($permisos, 10) . "\n";
        }
    }
}

// Función para formatear el tamaño en un formato legible
function formatearTamaño($bytes) {
    $unidades = ['B', 'KB', 'MB', 'GB', 'TB'];
    $unidadIndex = 0;

    while ($bytes >= 1024 && $unidadIndex < count($unidades) - 1) {
        $bytes /= 1024;
        $unidadIndex++;
    }

    return round($bytes, 2) . ' ' . $unidades[$unidadIndex];
}

// Función para crear un nuevo modelo
function crearModelo($nombreModelo) {
    $contenido = <<<PHP
<?php
if (!defined('APP_PATH'))
    exit('No direct script access allowed');

class ${nombreModelo} extends Database {
    private \$Tabla = 'Envios';

    public function __construct() {
        // Inicialización
    }

    public function ObtenerPorEmpresa(\$No = NULL, \$ClienteID) {
        if (empty(\$No)) {
            \$sql = "SELECT * FROM \$this->Tabla WHERE ClienteID = '\$ClienteID' ";
            return \$this->result_array(\$sql);
        } else {
            \$sql = "SELECT * FROM \$this->Tabla WHERE ClienteID = '\$ClienteID' AND No = '\$No'";
            return \$this->result_row(\$sql);
        }
    }
}
PHP;

    // Especificar la ruta donde se guardará el modelo
    $rutaModelo = "../srv/models/{$nombreModelo}.php";

    // Crear el directorio si no existe
    if (!is_dir(__DIR__ . './srv/models/')) {
        mkdir(__DIR__ . './srv/models/', 0755, true);
    }

    // Guardar el contenido en un archivo
    file_put_contents($rutaModelo, $contenido);
    echo "Modelo '{$nombreModelo}' creado en '{$rutaModelo}'.\n";
}

// Menú de opciones
while (true) {
    echo "\nElige una opción:\n";
    echo "1. Mostrar todos los recursos del servidor\n";
    echo "2. Crear un nuevo modelo\n";
    echo "3. Salir\n";
    echo "Opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            mostrarRecursos();
            break;
        case '2':
            echo "Ingresa el nombre del nuevo modelo: ";
            $nombreModelo = trim(fgets(STDIN));
            crearModelo($nombreModelo);
            break;
        case '3':
            echo "Saliendo...\n";
            exit(0);
        default:
            echo "Opción no válida. Por favor, elige de nuevo.\n";
    }
}




