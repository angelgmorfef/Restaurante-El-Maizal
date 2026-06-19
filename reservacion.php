<?php
session_start();
// Proteger la ruta: requiere inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ingreso.php");
    exit();
}

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservación - El Maizal</title>
    <link rel="stylesheet" href="asset/css/global.css">
    <link rel="stylesheet" href="asset/css/reservacion.css">
    <script src="https://js.stripe.com/v3/" defer></script>
    <script src="asset/js/app.js" defer></script>
    <script src="asset/js/reservacion.js" defer></script>
    <script src="asset/js/apipago.js" defer></script>
</head>
<body>
    <div class="page-bg" style="background-image: url('asset/img/restaurant-449952_1920.jpg');"></div>
    
    <header>
        <div class="logo">
            <img src="asset/img/logopri.jpeg" alt="El Maizal Logo">
            <div class="logo-text">
                <h1>"Cada bocado es un abrazo cálido, cada plato brilla como el sol, y cada mesa es un lugar para compartir en familia."</h1>
            </div>
        </div>
        <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav id="main-nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="about.php">Acerca</a></li>
                <li><a href="reservacion.php" class="reservar">Mis Reservas</a></li>
                <li><a href="logout.php" style="color: var(--primary-color);">Salir (<?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>)</a></li>
            </ul>
        </nav>
    </header>

    <main class="animate-fade-in-up">
        <section class="reservation-section">
            <div class="reservation-header">
                <h2 class="font-display">Reserva tu mesa</h2>
                <p>Por favor completa los detalles para tu reservación.</p>
            </div>

            <div class="reservation-grid">
                <!-- Formulario de detalles de reservación -->
                <div class="reservation-form-container">
                    <h3>1. Detalles de Reservación</h3>
                    <form id="reservation-details" class="auth-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" id="fecha" name="fecha" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" id="hora" name="hora" class="form-control" required min="12:00" max="23:00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personas" class="form-label">Número de Personas</label>
                            <select id="personas" name="personas" class="form-control" required>
                                <option value="1">1 Persona</option>
                                <option value="2" selected>2 Personas</option>
                                <option value="3">3 Personas</option>
                                <option value="4">4 Personas</option>
                                <option value="5">5 Personas</option>
                                <option value="6">6 Personas</option>
                                <option value="7">7+ Personas (Requiere anticipo mayor)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comentarios" class="form-label">Peticiones Especiales</label>
                            <textarea id="comentarios" name="comentarios" class="form-control" rows="3" placeholder="Alergias, silla para bebé, celebración de cumpleaños..."></textarea>
                        </div>
                    </form>
                </div>

                <!-- Selección de tipo de mesa -->
                <div class="movie-container">
                    <h3>2. Tipo de Mesa</h3>
                    <p>El costo de reservación se deducirá de tu cuenta final.</p>
                    <div class="form-group">
                        <label for="movie" class="form-label">Selecciona el ambiente:</label>
                        <select id="movie" class="form-control">
                            <option value="10">Mesa Pequeña / Pareja (USD $10)</option>
                            <option value="25">Mesa Grande / Terraza (USD $25)</option>
                            <option value="35">Mesa Familiar / Privado (USD $35)</option>
                        </select>
                    </div>
                    
                    <div class="reservation-summary">
                        <p class="text">Has seleccionado <span id="count">0</span> mesa(s) para reservar.</p>
                        <p class="text total-price">Total a pagar ahora: <strong>$<span id="total">0</span> USD</strong></p>
                    </div>
                </div>
            </div>

            <!-- Mapa del Restaurante -->
            <div class="restaurant-map-section">
                <h3>3. Selecciona tu Mesa</h3>
                <ul class="showcase">
                    <li><div class="seat"></div><small>Disponible</small></li>
                    <li><div class="seat selected"></div><small>Elegida</small></li>
                    <li><div class="seat sold"></div><small>Reservada</small></li>
                </ul>

                <div class="container">
                    <div class="screen-layout">
                        <div class="kitchen-area">Área de Cocina</div>
                        <div class="restroom-area">Baños</div>
                    </div>
                    
                    <!-- Simulación de Mesas en el restaurante -->
                    <div class="row">
                        <div class="table-group">
                            <div class="seat" data-table="1"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat" data-table="2"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat sold" data-table="3"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-group">
                            <div class="seat" data-table="4"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat" data-table="5"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat" data-table="6"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-group">
                            <div class="seat sold" data-table="7"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat" data-table="8"></div>
                        </div>
                        <div class="table-group">
                            <div class="seat" data-table="9"></div>
                        </div>
                    </div>
                    <div class="entrance-area">Entrada Principal</div>
                </div>
            </div>
            
            <!-- Pago Stripe -->
            <div class="payment-section">
                <div class="payment-container">
                    <form id="payment-form">
                        <h2>4. Pago Seguro</h2>
                        <p class="payment-info">Procesado a través de Stripe</p>
                        <div id="card-element"></div>
                        <button type="submit" class="btn btn-submit" id="submit-payment">Confirmar y Pagar</button>
                    </form>
                    <div id="error-message"></div>
                </div>
            </div>

            <!-- Mapa de Ubicación -->
            <section id="ubicacion" class="location-section">
                <h2>Encuéntranos</h2>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3922.8801810696805!2d-66.93815090051153!3d10.510102533568663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a5eef9a077a6f%3A0xa32826665e8e973!2sJesus%20Obrero%20Technical%20Institute!5e0!3m2!1sen!2sve!4v1747853772467!5m2!1sen!2sve" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
        </section>
    </main>

    <footer>
        <div class="container-social-network">
            <a href="#" target="_blank" aria-label="Facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#fff"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg></a>
            <a href="#" target="_blank" aria-label="Twitter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#fff"><path d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/></svg></a>
            <a href="#" target="_blank" aria-label="Instagram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="#fff"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
        </div>
        <p>&copy; <?php echo date('Y'); ?> El Maizal. Todos los derechos reservados.</p>
    </footer>
</body>
</html>