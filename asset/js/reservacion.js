// reservacion.js - Lógica para la selección de mesas en el restaurante

document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.container');
  const seats = document.querySelectorAll('.row .seat:not(.sold)');
  const count = document.getElementById('count');
  const total = document.getElementById('total');
  const movieSelect = document.getElementById('movie');
  
  if (!container || !count || !total || !movieSelect) return;

  populateUI();

  let ticketPrice = +movieSelect.value;

  // Actualizar el costo total de reservación y el contador
  function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    const selectedSeatsCount = selectedSeats.length;

    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
    localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice;
    
    // Almacenar el total para apipago.js
    localStorage.setItem('reservationTotal', selectedSeatsCount * ticketPrice);
    
    // Disparar evento personalizado para actualizar Stripe
    const event = new CustomEvent('reservationTotalUpdated', { detail: { total: selectedSeatsCount * ticketPrice } });
    document.dispatchEvent(event);
  }

  // Guardar índice de mesa/ambiente seleccionado y precio
  function setMovieData(movieIndex, moviePrice) {
    localStorage.setItem('selectedMovieIndex', movieIndex);
    localStorage.setItem('selectedMoviePrice', moviePrice);
  }

  // Evento al cambiar el tipo de mesa/ambiente
  movieSelect.addEventListener('change', (e) => {
    ticketPrice = +e.target.value;
    setMovieData(e.target.selectedIndex, e.target.value);
    updateSelectedCount();
  });

  // Evento al seleccionar una mesa
  container.addEventListener('click', (e) => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('sold')) {
      e.target.classList.toggle('selected');
      updateSelectedCount();
    }
  });

  // Rellenar la UI con datos de LocalStorage si existen
  function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

    if (selectedSeats !== null && selectedSeats.length > 0) {
      seats.forEach((seat, index) => {
        if (selectedSeats.indexOf(index) > -1) {
          seat.classList.add('selected');
        }
      });
    }

    const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

    if (selectedMovieIndex !== null) {
      movieSelect.selectedIndex = selectedMovieIndex;
    }
  }

  // Calcular precio inicial
  updateSelectedCount();
});
