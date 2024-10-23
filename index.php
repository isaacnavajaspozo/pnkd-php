<?php

if (defined('__FILE__') && realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
    http_response_code(403);
    echo "Acceso prohibido";
    exit();
}


require_once('./etc/kernel.php');

$myAppKernel = new Kernel();
$myAppKernel->coreRouter();
$myAppKernel->env();
$myAppKernel->errores();


