<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Menú del Restaurante El Maizal. Conoce nuestros platos tradicionales, desde arepas hasta cazuelas de mariscos.">
<title>El Maizal - Menú</title>
<link rel="stylesheet" href="asset/css/global.css">
<link rel="stylesheet" href="asset/css/menues.css">
<script src="asset/js/app.js" defer></script>
<script src="asset/js/precios.js" defer></script>
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

  <main class="animate-fade-in-up">
    <div class="content-wrapper">
      <h1>Menú</h1>
      
      <div class="currency-selector">
        <label for="currency">Moneda:</label>
        <select id="currency" aria-label="Selector de moneda">
          <option value="USD" selected>Dólar (USD)</option>
          <option value="EUR">Euro (EUR)</option>
          <option value="GBP">Libra Esterlina (GBP)</option>
          <option value="MXN">Peso Mexicano (MXN)</option>
          <option value="JPY">Yen Japonés (JPY)</option>
          <option value="VES">Bolívares (VES)</option>
        </select>
      </div>

      <!-- Entrantes -->
      <section class="menu-category">
        <h2>Entrantes</h2>
        <div class="table-responsive">
          <table aria-label="Entrantes">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr data-price-usd="6">
                <td><img src="asset/img/Queso Frito.webp" alt="Queso Frito" class="producto-img"></td>
                <td><span class="product-name">Queso Frito</span></td>
                <td class="price">$6.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12">
                <td><img src="asset/img/nachos-con-queso.webp" alt="Nachos" class="producto-img"></td>
                <td><span class="product-name">Nachos</span></td>
                <td class="price">$12.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12">
                <td><img src="asset/img/Bowl de Arepas.jpg" alt="Bowl de Arepas" class="producto-img"></td>
                <td><span class="product-name">Bowl de Arepas</span></td>
                <td class="price">$12.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/Empanadas.jpg" alt="Empanadas" class="producto-img"></td>
                <td><span class="product-name">Empanadas</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="1">
                <td><img src="asset/img/Yuca Frita.jpeg" alt="Yuca Frita" class="producto-img"></td>
                <td><span class="product-name">Yuca Frita</span></td>
                <td class="price">$1.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="3">
                <td><img src="asset/img/papas rellenas.webp" alt="Papas Rellenas" class="producto-img"></td>
                <td><span class="product-name">Papas Rellenas</span></td>
                <td class="price">$3.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="6">
                <td><img src="asset/img/TEQUEÑOS.jpg" alt="Tequeños" class="producto-img"></td>
                <td><span class="product-name">Tequeños</span></td>
                <td class="price">$6.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Menú del Día -->
      <section class="menu-category">
        <h2>Menú del Día</h2>
        <div class="table-responsive">
          <table aria-label="Menú del Día">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr data-price-usd="5.5">
                <td><img src="asset/img/Sancocho de Costilla.avif" alt="Sancocho de Costilla" class="producto-img"></td>
                <td><span class="product-name">Sancocho de Costilla</span></td>
                <td class="price">$5.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="6">
                <td><img src="asset/img/Mondongo.jpg" alt="Mondongo" class="producto-img"></td>
                <td><span class="product-name">Mondongo</span></td>
                <td class="price">$6.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="7">
                <td><img src="asset/img/Sancocho de Pescado.jpg" alt="Sancocho de Pescado" class="producto-img"></td>
                <td><span class="product-name">Sancocho de Pescado</span></td>
                <td class="price">$7.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="7">
                <td><img src="asset/img/Sancocho de Gallina.jpeg" alt="Sancocho de Gallina" class="producto-img"></td>
                <td><span class="product-name">Sancocho de Gallina</span></td>
                <td class="price">$7.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12">
                <td><img src="asset/img/Frijolada.jpg" alt="Frijolada" class="producto-img"></td>
                <td><span class="product-name">Frijolada</span></td>
                <td class="price">$12.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Bandejas -->
      <section class="menu-category">
        <h2>Bandejas</h2>
        <div class="table-responsive">
          <table aria-label="Bandejas">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Carne Asada.jpg" alt="Carne Asada" class="producto-img"></td>
                <td><span class="product-name">Carne Asada</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Carne Encebollada.jpg" alt="Carne Encebollada" class="producto-img"></td>
                <td><span class="product-name">Carne Encebollada</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Pollo a la Plancha.webp" alt="Pollo a la Plancha" class="producto-img"></td>
                <td><span class="product-name">Pollo a la Plancha</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Costillas a la BBQ.jpg" alt="Costillas a la BBQ" class="producto-img"></td>
                <td><span class="product-name">Costillas a la BBQ</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Carne Molida.jpg" alt="Carne Molida" class="producto-img"></td>
                <td><span class="product-name">Carne Molida</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="8.5">
                <td><img src="asset/img/Chuleta de Pollo (Cerdo y Pollo).avif" alt="Chuleta de Pollo" class="producto-img"></td>
                <td><span class="product-name">Chuleta de Pollo (Cerdo y Pollo)</span></td>
                <td class="price">$8.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Especiales -->
      <section class="menu-category">
        <h2>Especiales</h2>
        <div class="table-responsive">
          <table aria-label="Especiales">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr data-price-usd="6">
                <td><img src="asset/img/Arroz con Pollo.avif" alt="Arroz con Pollo" class="producto-img"></td>
                <td><span class="product-name">Arroz con Pollo</span></td>
                <td class="price">$6.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="15.5">
                <td><img src="asset/img/Cazuela-de-mariscos.jpg" alt="Cazuela de Mariscos" class="producto-img"></td>
                <td><span class="product-name">Cazuela de Mariscos</span></td>
                <td class="price">$15.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="15">
                <td><img src="asset/img/Bandeja-Paisa-Paisa.webp" alt="Bandeja Paisa" class="producto-img"></td>
                <td><span class="product-name">Bandeja Paisa</span></td>
                <td class="price">$15.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="16">
                <td><img src="asset/img/Arroz Paisa.avif" alt="Arroz Paisa" class="producto-img"></td>
                <td><span class="product-name">Arroz Paisa</span></td>
                <td class="price">$16.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="5.9">
                <td><img src="asset/img/Pabellon.jpg" alt="Pabellón" class="producto-img"></td>
                <td><span class="product-name">Pabellón</span></td>
                <td class="price">$5.90 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="10">
                <td><img src="asset/img/Tamales.webp" alt="Tamales" class="producto-img"></td>
                <td><span class="product-name">Tamales</span></td>
                <td class="price">$10.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Comida Rápida y Arepas -->
      <section class="menu-category">
        <h2>Comida Rápida y Especiales</h2>
        <div class="table-responsive">
          <table aria-label="Comida Rápida">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <tr data-price-usd="9.8">
                <td><img src="asset/img/Hamburguesa.avif" alt="Hamburguesa" class="producto-img"></td>
                <td>
                  <span class="product-name">Hamburguesa</span>
                  <span class="product-desc">Lechuga, tomate, carne, bacon, pollo, cebolla, queso, patatas</span>
                </td>
                <td class="price">$9.80 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="11.8">
                <td><img src="asset/img/Hamburguesa La Caprichosa.webp" alt="Hamburguesa La Caprichosa" class="producto-img"></td>
                <td>
                  <span class="product-name">Hamburguesa La Caprichosa</span>
                  <span class="product-desc">Lechuga, tomate, carne, bacon, queso, cebolla, queso y chicharrón por encima</span>
                </td>
                <td class="price">$11.80 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12.9">
                <td><img src="asset/img/Hamburguesa La Patrona XL.jpg" alt="Hamburguesa La Patrona XL" class="producto-img"></td>
                <td>
                  <span class="product-name">Hamburguesa La Patrona XL</span>
                  <span class="product-desc">Doble carne, bacon, chedar, cebolla caramelizada, lechuga, tomate, salsa especial</span>
                </td>
                <td class="price">$12.90 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="6.9">
                <td><img src="asset/img/Salchipapa Personal.jpg" alt="Salchipapa Personal" class="producto-img"></td>
                <td>
                  <span class="product-name">Salchipapa Personal</span>
                  <span class="product-desc">Papa, salchicha, pollo, salsas, queso</span>
                </td>
                <td class="price">$6.90 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="15.9">
                <td><img src="asset/img/Salchipapa de la Casa.jpg" alt="Salchipapa de la Casa" class="producto-img"></td>
                <td>
                  <span class="product-name">Salchipapa de la Casa</span>
                  <span class="product-desc">Papa, salchicha, pollo, carne, chicharrón, maduro, queso, salsas</span>
                </td>
                <td class="price">$15.90 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="30">
                <td><img src="asset/img/Salchipapa XL.jpg" alt="Salchipapa XL" class="producto-img"></td>
                <td>
                  <span class="product-name">Salchipapa XL</span>
                  <span class="product-desc">Papa, salchicha, pollo, carne, maduro, queso, salsas</span>
                </td>
                <td class="price">$30.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12">
                <td><img src="asset/img/istockphoto-1008382990-612x612.jpg" alt="Cachapa" class="producto-img"></td>
                <td>
                  <span class="product-name">Cachapa Especial</span>
                  <span class="product-desc">Pollo, carne, chorizo, queso, jamón, chicharrón</span>
                </td>
                <td class="price">$12.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="4.8">
                <td><img src="asset/img/Arepa-de-Pollo.jpg" alt="Arepa Solo Pollo" class="producto-img"></td>
                <td><span class="product-name">Arepa Solo Pollo</span></td>
                <td class="price">$4.80 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="4">
                <td><img src="asset/img/Arepa Solo Carne.jpg" alt="Arepa Solo Carne" class="producto-img"></td>
                <td><span class="product-name">Arepa Solo Carne</span></td>
                <td class="price">$4.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="4.5">
                <td><img src="asset/img/Arepa Mixta.webp" alt="Arepa Mixta" class="producto-img"></td>
                <td>
                  <span class="product-name">Arepa Mixta</span>
                  <span class="product-desc">Carne y pollo</span>
                </td>
                <td class="price">$4.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="6.9">
                <td><img src="asset/img/Arepa Maizal.jpg" alt="Arepa La del Maizal" class="producto-img"></td>
                <td><span class="product-name">Arepa La del Maizal</span></td>
                <td class="price">$6.90 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="5.8">
                <td><img src="asset/img/Arepa-Reina-Pepiada.webp" alt="Arepa La Pepiada" class="producto-img"></td>
                <td><span class="product-name">Arepa Reina Pepiada</span></td>
                <td class="price">$5.80 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="4.5">
                <td><img src="asset/img/arepa-rellena-con-chorizo.webp" alt="Arepa con Chorizo" class="producto-img"></td>
                <td><span class="product-name">Arepa con Chorizo</span></td>
                <td class="price">$4.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="12">
                <td><img src="asset/img/Chicharronada.webp" alt="Chicharronada 4 personas" class="producto-img"></td>
                <td>
                  <span class="product-name">Chicharronada</span>
                  <span class="product-desc">Para 4 personas</span>
                </td>
                <td class="price">$12.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="20">
                <td><img src="asset/img/Chicharronada.webp" alt="Chicharronada 20 personas" class="producto-img"></td>
                <td>
                  <span class="product-name">Chicharronada</span>
                  <span class="product-desc">Para 20 personas</span>
                </td>
                <td class="price">$20.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="7">
                <td><img src="asset/img/maicitos_cremosos.jpg" alt="Maicitos" class="producto-img"></td>
                <td><span class="product-name">Maicitos</span></td>
                <td class="price">$7.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Bebidas -->
      <section class="menu-category">
        <h2>Bebidas</h2>
        <div class="table-responsive">
          <table aria-label="Bebidas">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Tasa BCV</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <!-- Bebidas Frías -->
              <tr data-price-usd="2">
                <td><img src="asset/img/cocacola.jpg" alt="Coca-cola" class="producto-img"></td>
                <td><span class="product-name">Coca-cola</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/COCA COLA ZERO.jpg" alt="Coca-cola Cero" class="producto-img"></td>
                <td><span class="product-name">Coca-cola Zero</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/malta.webp" alt="Malta" class="producto-img"></td>
                <td><span class="product-name">Malta</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/nestea.jpg" alt="Nestea" class="producto-img"></td>
                <td><span class="product-name">Nestea</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/red bull.webp" alt="Red Bull" class="producto-img"></td>
                <td><span class="product-name">Red Bull</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="1">
                <td><img src="asset/img/awa.jpg" alt="Agua" class="producto-img"></td>
                <td><span class="product-name">Agua Mineral</span></td>
                <td class="price">$1.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/papelon.webp" alt="Papelón con limón" class="producto-img"></td>
                <td><span class="product-name">Papelón con Limón</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>

              <!-- Jugos Naturales -->
              <tr data-price-usd="6.5">
                <td><img src="asset/img/Jugos naturales en agua.jpg" alt="Jugos naturales en agua" class="producto-img"></td>
                <td>
                  <span class="product-name">Jugos Naturales en Agua</span>
                  <span class="product-desc">Mora, guanábana, maracuyá, mango, frutos del bosque, borojó</span>
                </td>
                <td class="price">$6.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="7">
                <td><img src="asset/img/Jugos naturales en leche.jpg" alt="Jugos naturales en leche" class="producto-img"></td>
                <td>
                  <span class="product-name">Jugos Naturales en Leche</span>
                  <span class="product-desc">Mora, guanábana, maracuyá, mango, frutos del bosque, borojó</span>
                </td>
                <td class="price">$7.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>

              <!-- Bebidas Calientes -->
              <tr data-price-usd="1.8">
                <td><img src="asset/img/cefeleche.jpg" alt="Café con leche" class="producto-img"></td>
                <td><span class="product-name">Café con Leche</span></td>
                <td class="price">$1.80 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="2">
                <td><img src="asset/img/cafe.JPG" alt="Café" class="producto-img"></td>
                <td><span class="product-name">Café Negro</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="3">
                <td><img src="asset/img/choco.webp" alt="Chocolate" class="producto-img"></td>
                <td><span class="product-name">Chocolate Caliente</span></td>
                <td class="price">$3.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="1.5">
                <td><img src="asset/img/Aromáticas.jpg" alt="Aromáticas" class="producto-img"></td>
                <td>
                  <span class="product-name">Aromáticas</span>
                  <span class="product-desc">Manzanilla, té verde, frutos rojos, jengibre y miel, menta poleo</span>
                </td>
                <td class="price">$1.50 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>

              <!-- Cervezas -->
              <tr data-price-usd="2">
                <td><img src="asset/img/Birra_Polar_001.jpg" alt="Cerveza" class="producto-img"></td>
                <td><span class="product-name">Cerveza Polar</span></td>
                <td class="price">$2.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
              <tr data-price-usd="3">
                <td><img src="asset/img/light.webp" alt="Cerveza Light" class="producto-img"></td>
                <td><span class="product-name">Cerveza Light</span></td>
                <td class="price">$3.00 USD</td>
                <td class="price-bolivares">Cargando...</td>
                <td><a href="reservacion.php" class="btn btn-pedir">Pedir ahora</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </div>
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
