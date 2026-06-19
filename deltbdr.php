<?php
require_once 'config.php';
require_once 'conexionr.php';

// Script para eliminar usuario (requiere id en GET/POST idealmente, aquí lo hacemos dinámico)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = mysqli_prepare($conexion, "DELETE FROM registro WHERE id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Se eliminó el registro " . $id;
        } else {
            echo "Ocurrió un error al eliminar";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "ID no válido";
}
mysqli_close($conexion);
?>