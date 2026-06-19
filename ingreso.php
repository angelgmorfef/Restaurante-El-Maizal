<?php
session_start();
// Si ya está logueado, redirigir
if (isset($_SESSION['usuario'])) {
    header("Location: reservacion.php");
    exit();
}

require_once 'config.php';
require_once 'conexionr.php';

$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['clave'])) {
        $email = trim($_POST['email']);
        $clave_input = $_POST['clave'];
        
        $stmt = mysqli_prepare($conexion, "SELECT * FROM registro WHERE email = ? LIMIT 1");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            
            if ($resultado && mysqli_num_rows($resultado) === 1) {
                $usuario = mysqli_fetch_assoc($resultado);
                $hash_db = $usuario['clave'];
                
                // Verificar contraseña: 
                // Primero intentamos password_verify (nuevo sistema seguro)
                // Si falla, intentamos MD5 (para compatibilidad con usuarios antiguos)
                $password_correcta = false;
                $necesita_rehash = false;

                if (password_verify($clave_input, $hash_db)) {
                    $password_correcta = true;
                } elseif (md5($clave_input) === $hash_db) {
                    $password_correcta = true;
                    $necesita_rehash = true; // Migración de MD5 a BCRYPT
                }

                if ($password_correcta) {
                    // Si la contraseña es antigua (MD5), la actualizamos a bcrypt
                    if ($necesita_rehash) {
                        $nuevo_hash = password_hash($clave_input, PASSWORD_DEFAULT);
                        $update_stmt = mysqli_prepare($conexion, "UPDATE registro SET clave = ? WHERE id = ?");
                        if ($update_stmt) {
                            // Asumiendo que la columna id existe en registro
                            if(isset($usuario['id'])) {
                                mysqli_stmt_bind_param($update_stmt, "si", $nuevo_hash, $usuario['id']);
                                mysqli_stmt_execute($update_stmt);
                                mysqli_stmt_close($update_stmt);
                            }
                        }
                    }

                    // No guardar la contraseña en la sesión
                    unset($usuario['clave']);
                    $_SESSION['usuario'] = $usuario;
                    
                    header("Location: reservacion.php");
                    exit();
                } else {
                    $errorMsg = "Email y/o Contraseña incorrectos.";
                }
            } else {
                $errorMsg = "Email y/o Contraseña incorrectos.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $errorMsg = "Error en el sistema. Intente de nuevo más tarde.";
        }
    } else {
        $errorMsg = "Por favor, completa ambos campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso - El Maizal</title>
    <link rel="stylesheet" href="asset/css/global.css">
    <link rel="stylesheet" href="asset/css/ingresos.css">
    <script src="asset/js/app.js" defer></script>
</head>
<body>
    <div class="page-bg" style="background-image: url('asset/img/mix-grill-7414547_1280.jpg');"></div>
    
    <a href="index.php" class="volver">Volver a Inicio</a>
    
    <div class="auth-container animate-fade-in-up">
        <div class="auth-header">
            <img src="asset/img/logopri.jpeg" alt="Logo" class="auth-logo">
            <h1>Ingreso de Usuario</h1>
            <p>Bienvenido de vuelta a El Maizal</p>
        </div>

        <?php if (!empty($errorMsg)): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($errorMsg); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="auth-form">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="tu@email.com" maxlength="50" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" id="clave" name="clave" class="form-control" required placeholder="Contraseña" maxlength="50">
            </div>
            
            <button type="submit" class="btn btn-submit" id="in">Ingresar</button>
            
            <div class="auth-footer">
                <p>¿Aún no te registras? <a href="registro.php" class="auth-link">Regístrate aquí</a></p>
            </div>
        </form>
    </div>
</body>
</html>