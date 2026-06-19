<?php
// config.php - Configuración centralizada

// Definir constante para evitar acceso directo a otros scripts
define('BASE_PATH', dirname(__FILE__));

// Configuración de la Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'maizal');

// Configuración de Stripe (Reemplazar con variables de entorno en producción)
define('STRIPE_SECRET_KEY', 'sk_test_your_secret_key_here');

// Configuración general
define('SITE_NAME', 'El Maizal');
define('CURRENCY', 'usd');

// Reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
