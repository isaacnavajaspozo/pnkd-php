<?php
$env_file = __DIR__ . '/.env';

require_once('./Pinkragon/kernel.php');

$myAppKernel = new Kernel();
$myAppKernel->env();

$greenColor = "\033[0;32m";
$redColor = "\033[0;31m";
$newColor = "\033[0;35m";
$infoColor = "\033[0;33m";
$resetColor = "\033[0m";

while (true) {
    printMenu();

    $opcion = readline("Choose the helper you want to install in your repository: ");

    switch ($opcion) {
        case '1':
            installHelperApiRrest();
            break;
        case '2':
            installHelperDashboards();
            break;
        case '3':
            installHelperDates();
            break;
        case '4':
            installHelperEmail();
            break;
        case '5':
            installHelperForms();
            break;
        case '6':
            installHelperLogins();
            break;
        case '7':
            installHelperPasswordGenerators();
            break;
        case '8':
            installHelperSessions();
            break;
        case '9':
            installHelperCookies();
            break;
        case '10':
            installHelperCookies();
            break;
        case '11':
            updateQultep();
            break;
        case 'exit':
            echo "End of update.\n";
            exit; // Salir del programa
        case 'help':
            help();
            break;
        default:
            echo "Invalid option. Please choose a valid option.\n";
            break;
    }
}

function printMenu() {
    global $greenColor, $redColor, $resetColor, $infoColor, $newColor;
    $version = getenv('VERSION');
    echo "\n👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺\n";
    echo "$redColor";
    echo "Welcome to the Framework Installer \n";
    echo "$greenColor";
    echo "========================================\n";
    echo "$infoColor";
    echo "If you do not have access to all the helpers, it is advisable to install the latest version of the framework. \n";
    echo "$greenColor";
    echo "========================================\n";
    echo "Your current version is $version.\n";
    echo "========================================\n";
    echo "Please choose an option:\n";
    echo "1.    ApiRrest " . $newColor . "(new)\n";
    echo $greenColor;
    echo "2.    Dashboards \n";
    echo "3.    Dates \n";
    echo "4.    Emails \n";
    echo "5.    Forms \n";
    echo "6.    Logins \n";
    echo "7.    PasswordGenerators \n";
    echo "8.    Sessions \n";
    echo "9.    Cookies \n";
    echo "10.   Logs \n";
    echo "11.   " . $infoColor . "Update Qultep to the latest version $greenColor \n";
    echo "exit. Exit framework installer \n";
    echo "========================================\n";
    echo $resetColor;
}

function updateQultep() {
    global $greenColor, $redColor, $infoColor, $resetColor;
    echo "\n🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥🔥\n";
    echo "$redColor";
    echo "Updating packages...$infoColor\n";
    try {
        // Simulación de proceso 
        $total = 50;
        for ($i = 1; $i <= $total; $i++) {
            usleep(100000);
            $porcentaje = round(($i / $total) * 100);
            imprimirBarraProgreso($porcentaje);
        }
        echo "\nCompleted process!\n";
        echo "The methods and calls of the helpers are always the same, so your application will not be affected. $greenColor\n";
        echo "$greenColor";
        echo "update finished. \n";
    } catch (Exception $e) {
        // Captura la excepción y maneja el error
        echo "There was an error: " . $e->getMessage() . "\n";
    }
    echo "The Qultep framework has been successfully updated.\n";
    echo $resetColor;
}

function installHelperApiRrest() {
    echo "\n👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺\n";
    //Lógica para instalar el helper ApiRrest
}

function installHelperDashboards() {
    echo "\n👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺\n";
}

function help() {
    echo "\n👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺👺\n";
}



function imprimirBarraProgreso($porcentaje) {
    $longitudBarra = 20;
    $completado = floor($porcentaje / 100 * $longitudBarra);
    $barra = str_repeat("=", $completado) . str_repeat(" ", $longitudBarra - $completado);
    echo "[" . $barra . "] " . $porcentaje . "%\r";
    flush();
}



/*
Para descargar una carpeta del proyecto de git actualizado a la ultima version a nuestro proyecto 

<?php

// Ruta al archivo ZIP descargado
$zipFile = 'ruta/a/la/carpeta/clonada/del/repositorio/carpeta_a_descargar.zip';

// Ruta de destino donde deseas descomprimir la carpeta
$destinationFolder = 'ruta/de/destino/para/descomprimir';

// Crear una instancia de ZipArchive
$zip = new ZipArchive;

// Abrir el archivo ZIP
if ($zip->open($zipFile) === TRUE) {
    // Extraer el contenido del archivo ZIP a la ruta de destino
    $zip->extractTo($destinationFolder);
    // Cerrar el archivo ZIP
    $zip->close();
    // Eliminar el archivo ZIP después de la descarga si es necesario
    unlink($zipFile);
    echo 'La carpeta se ha descomprimido correctamente.';
} else {
    echo 'Error al abrir el archivo ZIP.';
}

?>

para conocer la ruta del repositorio git lo hago a traves de inspeccionar por ejemplo: 
https://github.com//isaacnavajas/Calculator/archive/refs/heads/master.zip

para conocer la riuta de la carpeta a la que la queremos enviar podemos hacer:
$destinationFolder = __DIR__ . '/Lodge/';
// Verificar si la carpeta de destino existe, si no, crearla
if (!file_exists($destinationFolder)) {
    mkdir($destinationFolder, 0777, true); // Crear la carpeta recursivamente
}



*/
?>




