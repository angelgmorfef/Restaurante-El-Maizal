<?php
session_start();
// Si ya está logueado, redirigir
if (isset($_SESSION['usuario'])) {
    header("Location: reservacion.php");
    exit();
}

require_once 'config.php';
require_once 'conexionr.php';

$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['name']);
    $telefono   = trim($_POST['telefono_completo']);
    $email      = trim($_POST['email']);
    $comentario = trim($_POST['area']);
    
    // Hash seguro de la contraseña usando bcrypt
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conexion, "SELECT COUNT(*) FROM registro WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
        $errorMsg = "Este usuario ya se encuentra registrado con ese correo.";
    } else {
        $sql = "INSERT INTO registro (nombre, telefono, email, clave, fechaderegistro, comentario)
                VALUES (?, ?, ?, ?, NOW(), ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $nombre, $telefono, $email, $clave, $comentario);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('¡Registro Exitoso! Ahora puedes iniciar sesión.');
                    window.location.href = 'ingreso.php';
                  </script>";
            exit();
        } else {
            $errorMsg = "Error al registrar: " . mysqli_error($conexion);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexion);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - El Maizal</title>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="asset/css/global.css">
    <link rel="stylesheet" href="asset/css/registros.css">
    <script src="asset/js/app.js" defer></script>
    <script src="asset/js/rgistro.js" defer></script>
</head>
<body>
    <div class="page-bg" style="background-image: url('asset/img/pasta-6263653_1920.jpg');"></div>
    
    <a href="index.php" class="volver">Volver a Inicio</a>
    
    <main class="auth-container animate-fade-in-up">
        <div class="auth-header">
            <img src="asset/img/logopri.jpeg" alt="Logo" class="auth-logo">
            <h1>Registro de Usuario</h1>
            <p>Únete a la familia de El Maizal</p>
        </div>

        <?php if (!empty($errorMsg)): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($errorMsg); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formulario" autocomplete="off" class="auth-form">
            <div class="form-group">
                <label for="name" class="form-label">Nombres y Apellidos</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Ej: Juan Pérez" maxlength="50" minlength="2">
                <p class="form-error" id="avisoName">Este campo solo admite texto, mínimo 2 y máximo 50 caracteres.</p>
            </div>

            <div class="form-group">
                <label for="tel" class="form-label">Teléfono</label>
                <div class="telefono-group">
                    <select id="codigoArea" class="form-control" required>
                        <option value="">Cód.</option>
                        <option value="0414">0414</option>
                        <option value="0424">0424</option>
                        <option value="0416">0416</option>
                        <option value="0426">0426</option>
                        <option value="0412">0412</option>
                        <option value="0212">0212</option>
                    </select>
                    <input type="tel" name="tel" id="tel" class="form-control" required placeholder="1234567" pattern="[0-9]{7}" minlength="7" maxlength="7">
                    <input type="hidden" name="telefono_completo" id="telefono_completo">
                </div>
                <p class="form-error" id="avisoTel">El teléfono debe contener 7 dígitos y solo números.</p>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="tu@email.com" maxlength="50" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[cC][oO][mM]$">
                <p class="form-error" id="avisoEmail">Ingresa un correo electrónico válido terminado en .com.</p>
            </div>

            <div class="form-group">
                <label for="clave1" class="form-label">Contraseña</label>
                <input type="password" name="clave" id="clave1" class="form-control" required placeholder="Mínimo 5 caracteres" minlength="5" maxlength="50">
                <p class="form-error" id="avisoClave1">La contraseña debe contener mínimo 5 caracteres.</p>
            </div>

            <div class="form-group">
                <label for="clave2" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="clave2" class="form-control" required placeholder="Confirma la contraseña" minlength="5" maxlength="50">
                <p class="form-error" id="avisoClave2">Las contraseñas no coinciden.</p>
            </div>

            <div class="form-group">
                <label for="area" class="form-label">Comentario (Opcional)</label>
                <textarea name="area" id="area" class="form-control" maxlength="500" placeholder="¿Tienes alguna alergia o preferencia especial?" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-submit" id="re">Registrarme</button>
            
            <div class="auth-footer">
                <p>¿Ya tienes una cuenta? <a href="ingreso.php" class="auth-link">Ingresar aquí</a></p>
            </div>
        </form>
    </main>
</body>
</html>