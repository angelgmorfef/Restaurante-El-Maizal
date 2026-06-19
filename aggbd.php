<?php
require_once 'config.php';
require_once 'conexionr.php';

if (isset($_POST['name'], $_POST['telefono_completo'], $_POST['email'], $_POST['clave'])) {
    $nombre     = trim($_POST['name']);
    $telefono   = trim($_POST['telefono_completo']);
    $email      = trim($_POST['email']);
    $clave      = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $comentario = isset($_POST['area']) ? trim($_POST['area']) : '';

    $sql = "INSERT INTO registro (nombre, telefono, email, clave, fechaderegistro, comentario) VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nombre, $telefono, $email, $clave, $comentario);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                 alert('Registro Exitoso!');
                 window.location.href = 'ingreso.php';
                 </script>";
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta.";
    }
    mysqli_close($conexion);
} else {
    echo "Error: no se recibieron los datos del formulario.";
}
?>