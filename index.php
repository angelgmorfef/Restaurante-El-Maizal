<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurante El Maizal - Auténtica comida tradicional. Arepas, cachapas, carnes asadas y más.">
    <title>El Maizal - Inicio</title>
    <link rel="stylesheet" href="asset/css/global.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <script src="asset/js/app.js" defer></script>
</head>
<body>
    <div class="page-bg"></div>
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
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="reservacion.php" class="reservar">Mis Reservas</a></li>
                    <li><a href="logout.php" style="color: #e76f51;">Salir</a></li>
                <?php else: ?>
                    <li><a href="ingreso.php" class="reservar">Reservar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome animate-fade-in-up">
            <div class="welcome-container">
                <h2>Bienvenido a <span>El Maizal</span></h2>
                <p>Descubre nuestros exquisitos platillos y bebidas en una experiencia única de sabor.</p>
                <a href="menu.php" class="btn">Explorar Menú</a>
            </div>
        </section>
    
        <section class="menu-section animate-fade-in-up" style="animation-delay: 0.2s;">
            <h3 class="font-display">🍽️ Especialidades</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="asset/img/Arepa Mixta.webp" alt="Arepas Tradicionales">
                    <h4>Arepas Tradicionales</h4>
                    <p>Rellenas con ingredientes frescos y típicos.</p>
                </div>

                <div class="menu-item">
                    <img src="asset/img/istockphoto-1008382990-612x612.jpg" alt="Cachapas Venezolanas">
                    <h4>Cachapas Venezolanas</h4>
                    <p>Con queso de mano y más.</p>
                </div>

                <div class="menu-item">
                    <img src="asset/img/Carne Asada.jpg" alt="Carne Asada">
                    <h4>Carne Asada</h4>
                    <p>Cortes de carne a la parrilla.</p>
                </div>

                <div class="menu-item">
                    <img src="asset/img/Costillas a la BBQ.jpg" alt="Costillas a la BBQ">
                    <h4>Costillas</h4>
                    <p>Intensa en sabor y textura.</p>
                </div>
            </div>
        </section>

        <section class="menu-section animate-fade-in-up" style="animation-delay: 0.4s;">
            <h3 class="font-display">🥤 Bebidas Refrescantes</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="asset/img/agua-beber.jpg.webp" alt="Agua">
                    <h4>Agua</h4>
                    <p>Pásala suave.</p>
                </div>
                <div class="menu-item">
                    <img src="asset/img/cocaindex.jpg" alt="Refrescos">
                    <h4>Refrescos</h4>
                    <p>Una alternativa deliciosa y burbujeante.</p>
                </div>
                <div class="menu-item">
                    <img src="asset/img/Jugos naturales en agua.jpg" alt="Jugos Naturales">
                    <h4>Jugos Naturales</h4>
                    <p>Azúcares Naturales</p>
                </div>
                <div class="menu-item">
                    <img src="asset/img/Pepelon-con-Limonincex.webp" alt="Especialidades">
                    <h4>Especialidades</h4>
                    <p>Con frutas de temporada.</p>
                </div>
            </div>
        </section>

        <section class="menu-section animate-fade-in-up" style="animation-delay: 0.6s;">
            <h3 class="font-display">🍹 Bebidas Alcohólicas</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="asset/img/depositphotos_359568882-stock-photo-vodkas-rhum-gin-alcohol-liquors.jpg" alt="Bebidas Alcohólicas">
                    <h4>Bebidas Alcohólicas</h4>
                    <p>Vinos, cervezas y cócteles.</p>
                </div>
                <div class="menu-item">
                    <img src="asset/img/low-strong-alcohol-cocktal-drinks-600nw-2498883129.webp" alt="Cócteles Exclusivos">
                    <h4>Cócteles Exclusivos</h4>
                    <p>Con frutas frescas y licores premium.</p>
                </div>
            </div>
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
