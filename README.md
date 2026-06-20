# El Maizal - Sitio Web y Sistema de Reservas para Restaurante Familiar

Este es el repositorio del sitio web de **El Maizal**, un restaurante tradicional especializado en exquisita comida y bebidas tradicionales (arepas, cachapas, carnes asadas, costillas, jugos naturales y cócteles).

El sistema incluye un sitio informativo moderno y responsivo, un completo flujo de registro y autenticación de usuarios, una interfaz visual e interactiva para la selección física de mesas en el establecimiento, y una pasarela de pagos integrada de forma segura con **Stripe API** para el cobro anticipado de la reserva.

---

## 🚀 Utilidad y Características Clave

El sitio web sirve como la plataforma digital interactiva del restaurante para mejorar la experiencia del cliente y la gestión de reservas:

1. **Catálogo de Menú y Especialidades**:
   - Muestra las especialidades del restaurante (Entradas, Bebidas sin alcohol, Bebidas con alcohol).
   - Diseño moderno con efectos hover, animaciones suaves y adaptabilidad a dispositivos móviles.

2. **Autenticación Segura de Usuarios**:
   - Sistema de **Registro** e **Ingreso** (Login/Register).
   - Contraseñas encriptadas mediante algoritmos seguros de hashing (`bcrypt`).
   - Soporte heredado y migración automática transparente para hashes antiguos (MD5 a bcrypt) al iniciar sesión.

3. **Mapa Interactivo de Reservaciones**:
   - Selección dinámica del tipo de mesa y del ambiente (Mesa Pequeña, Grande/Terraza, Familiar/Privado), con tarifas ajustables por categoría.
   - Plano interactivo en tiempo real donde el cliente puede hacer clic y seleccionar físicamente la ubicación de su mesa.
   - Sincronización del estado del formulario y almacenamiento local (`localStorage`) para evitar pérdida de datos por refrescos accidentales de página.

4. **Procesamiento de Pagos Seguro (Stripe)**:
   - Integración con **Stripe API** (Stripe Client SDK en Javascript y PHP SDK en backend).
   - Interfaz de pagos incorporada a través de Stripe Elements (`card-element`), evitando que los datos confidenciales de la tarjeta toquen el servidor del restaurante (cumplimiento PCI-DSS).

---

## 🛠️ Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3 personalizado (con variables globales, temas y transiciones), JavaScript (ES6+).
- **Backend**: PHP (con soporte para Sesiones seguras y Consultas Preparadas SQL).
- **Base de Datos**: MySQL.
- **Pasarela de Pago**: Stripe API (SDK de PHP en el backend y `Stripe.js` en el frontend).

---

## 📋 Requisitos Previos

Para ejecutar este proyecto localmente, necesitarás tener instalado:
- Un servidor local PHP y MySQL (como **XAMPP**, Laragon o MAMP).
- **Composer** (si requieres actualizar las dependencias en la carpeta `asset/plugins/vendor`).
- Una cuenta de **Stripe** para obtener las claves de API (pública y secreta) para pruebas.

---

## ⚙️ Configuración e Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/angelgmorfef/Restaurante-El-Maizal.git
cd Restaurante-El-Maizal
```

### 2. Importar la Base de Datos
Debes crear una base de datos en tu servidor local MySQL llamada `maizal`.
Crea la tabla de registro ejecutando la siguiente consulta SQL en tu gestor de base de datos (como phpMyAdmin):

```sql
CREATE DATABASE IF NOT EXISTS maizal DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE maizal;

CREATE TABLE IF NOT EXISTS registro (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  clave VARCHAR(255) NOT NULL,
  fechaderegistro DATETIME NOT NULL,
  comentario TEXT DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

### 3. Configurar Parámetros del Entorno
Edita el archivo [config.php](config.php) en el directorio raíz para configurar las credenciales de tu base de datos y de Stripe:

```php
// Configuración de la Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'tu_usuario');
define('DB_PASS', 'tu_contraseña');
define('DB_NAME', 'maizal');

// Configuración de Stripe (Reemplazar con tus variables de entorno)
define('STRIPE_SECRET_KEY', 'sk_test_tu_clave_secreta_aqui');
```

En el archivo [apipago.js](asset/js/apipago.js), actualiza la clave pública de Stripe:
```javascript
const stripe = Stripe('pk_test_tu_clave_publica_aqui');
```

### 4. Ejecución
Mueve o clona esta carpeta a la raíz del servidor web (ej. `C:/xampp/htdocs/` o `/var/www/html/`).
Asegúrate de que los servicios de Apache y MySQL estén iniciados.
Abre tu navegador e ingresa a `http://localhost/RestauranteFamiliar/`.

---

## 🧑‍💻 Desarrollador
- **Angel M** (angelmorfefernandes@gmail.com)
