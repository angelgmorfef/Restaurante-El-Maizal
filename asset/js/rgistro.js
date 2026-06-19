// rgistro.js - Validaciones para el formulario de registro

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formulario');
  
  if (!form) return;

  const nameInput = document.getElementById('name');
  const avisoName = document.getElementById('avisoName');
  
  const codigoArea = document.getElementById('codigoArea');
  const telInput = document.getElementById('tel');
  const telefonoCompleto = document.getElementById('telefono_completo');
  const avisoTel = document.getElementById('avisoTel');
  
  const clave1 = document.getElementById('clave1');
  const clave2 = document.getElementById('clave2');
  const avisoClave1 = document.getElementById('avisoClave1');
  const avisoClave2 = document.getElementById('avisoClave2');
  
  const emailInput = document.getElementById('email');
  const avisoEmail = document.getElementById('avisoEmail');

  // Funciones de validación
  function validarNombre() {
    const value = nameInput.value.trim();
    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    
    if (value.length > 0 && (value.length < 2 || !regex.test(value))) {
      avisoName.style.display = 'block';
    } else {
      avisoName.style.display = 'none';
    }
  }

  function validarTelefono() {
    const telValue = telInput.value.trim();
    const telRegex = /^\d{7}$/;
    
    if (telValue.length > 0 && !telRegex.test(telValue)) {
      avisoTel.style.display = 'block';
      telefonoCompleto.value = '';
    } else {
      avisoTel.style.display = 'none';
      telefonoCompleto.value = codigoArea.value + telValue;
    }
  }

  function verificarContrasenas() {
    if (clave1.value.length > 0 && clave1.value.length < 5) {
      avisoClave1.style.display = 'block';
    } else {
      avisoClave1.style.display = 'none';
    }

    if (clave2.value.length > 0 && clave1.value !== clave2.value) {
      avisoClave2.style.display = 'block';
    } else {
      avisoClave2.style.display = 'none';
    }
  }

  function validarEmail() {
    const pattern = emailInput.getAttribute('pattern') || '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[cC][oO][mM]$';
    const regex = new RegExp(pattern);
    
    if (emailInput.value.length > 0 && !regex.test(emailInput.value)) {
      avisoEmail.style.display = 'block';
    } else {
      avisoEmail.style.display = 'none';
    }
  }

  // Escuchar eventos
  nameInput.addEventListener('input', validarNombre);
  telInput.addEventListener('input', validarTelefono);
  codigoArea.addEventListener('change', validarTelefono);
  clave1.addEventListener('input', verificarContrasenas);
  clave2.addEventListener('input', verificarContrasenas);
  emailInput.addEventListener('input', validarEmail);

  // Antes de enviar, actualizar el teléfono completo y prevenir envío si las contraseñas no coinciden
  form.addEventListener('submit', function(e) {
    telefonoCompleto.value = codigoArea.value + telInput.value;
    
    if (clave1.value !== clave2.value) {
      e.preventDefault();
      avisoClave2.style.display = 'block';
    }
  });

  // Reiniciar formulario al mostrar página
  window.addEventListener('pageshow', () => {
    form.reset();
  });
});
