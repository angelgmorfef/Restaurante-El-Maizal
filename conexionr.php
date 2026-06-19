<?php
// conexionr.php
require_once 'config.php';

$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar charset a utf8 para caracteres especiales
$conexion->set_charset("utf8");
?>
