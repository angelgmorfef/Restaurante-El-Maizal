// apipago.js - Integración con Stripe para el pago de la reservación

document.addEventListener('DOMContentLoaded', () => {
  // Inicializar Stripe con la clave pública de prueba
  // (Esta clave pública puede estar en el frontend)
  const stripe = Stripe('pk_test_51RPr8lPtt7m9WLkKKm98qC7tH6a2sP1hT4gX7vM2kL0nB3vN7aL4kX5jM9pQ3rT2hF1sV8wB6yN4aL5rT1gH8xV6');
  const elements = stripe.elements();

  // Crear el elemento de tarjeta
  const cardElement = elements.create('card', {
    style: {
      base: {
        color: '#32325d',
        fontFamily: '"Poppins", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    }
  });

  // Montar el elemento de tarjeta en el DOM
  if(document.getElementById('card-element')) {
    cardElement.mount('#card-element');
  }

  // Manejar errores de validación en tiempo real
  cardElement.on('change', function(event) {
    const displayError = document.getElementById('error-message');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Manejar el envío del formulario
  const form = document.getElementById('payment-form');
  const submitBtn = document.getElementById('submit-payment');
  
  if(form) {
    form.addEventListener('submit', async function(event) {
      event.preventDefault();

      const reservationForm = document.getElementById('reservation-details');
      if (reservationForm && !reservationForm.checkValidity()) {
        reservationForm.reportValidity();
        return;
      }

      // Deshabilitar el botón para evitar doble envío
      submitBtn.disabled = true;
      submitBtn.textContent = 'Procesando pago...';
      const displayError = document.getElementById('error-message');
      displayError.textContent = '';

      // Obtener el total a pagar desde localStorage (esto debería calcularse de forma segura en el backend en producción,
      // aquí lo enviamos para demostración al apir.php)
      const totalAmount = parseFloat(localStorage.getItem('reservationTotal') || 0);

      if (totalAmount <= 0) {
        displayError.textContent = 'Seleccione al menos una mesa para continuar con el pago.';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Confirmar y Pagar';
        return;
      }

      try {
        // En producción, pasaríamos los detalles del pedido y backend calcula el total
        const response = await fetch('apir.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ 
            items: [{ id: 'reservacion', amount: totalAmount }] 
          }),
        });

        const data = await response.json();

        if (data.error) {
          throw new Error(data.error);
        }

        const clientSecret = data.clientSecret;

        // Confirmar el pago en el frontend
        const { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
          payment_method: {
            card: cardElement,
            billing_details: {
              name: 'Cliente Restaurante'
            }
          }
        });

        if (error) {
          // Mostrar error si la confirmación falla
          displayError.textContent = error.message;
          submitBtn.disabled = false;
          submitBtn.textContent = 'Confirmar y Pagar';
        } else {
          if (paymentIntent.status === 'succeeded') {
            // El pago se ha completado
            alert('¡Pago exitoso! Su reservación ha sido confirmada.');
            
            // Limpiar datos
            localStorage.removeItem('selectedSeats');
            localStorage.removeItem('reservationTotal');
            localStorage.removeItem('selectedMovieIndex');
            localStorage.removeItem('selectedMoviePrice');
            
            // Redirigir a una página de éxito o al inicio
            window.location.href = 'index.php';
          }
        }
      } catch (err) {
        console.error('Error al procesar pago:', err);
        displayError.textContent = 'Error al conectar con el servidor de pagos.';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Confirmar y Pagar';
      }
    });
  }
});
