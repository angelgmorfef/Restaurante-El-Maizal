// precios.js - Actualiza los precios en Bolívares usando la API del BCV

document.addEventListener('DOMContentLoaded', () => {
  const currencySelect = document.getElementById('currency');
  const priceCells = document.querySelectorAll('tr[data-price-usd]');
  
  // Tasa por defecto
  let bcvRate = 1; 
  let currentCurrency = 'USD';
  let isRateLoaded = false;

  // Tasas de conversión fijas para demostración (en producción usar APIs reales para EUR, GBP, etc)
  const exchangeRates = {
    'USD': 1,
    'EUR': 0.92,
    'GBP': 0.79,
    'MXN': 17.05,
    'JPY': 150.20
  };

  // Función para obtener la tasa del BCV
  async function fetchBcvRate() {
    try {
      // Endpoint oficial no oficial (cors proxy o apis públicas como DolarApi)
      // DolarApi retorna el precio oficial del BCV
      const response = await fetch('https://ve.dolarapi.com/v1/dolares/oficial');
      
      if (!response.ok) {
        throw new Error('Error al obtener la tasa del BCV');
      }
      
      const data = await response.json();
      
      // FIX: DolarAPI retorna el precio como número (ej: 36.5), 
      // pero si retornara string con coma hay que reemplazarla
      let rateStr = String(data.promedio || data.precio || 36.0);
      rateStr = rateStr.replace(',', '.');
      bcvRate = parseFloat(rateStr);
      
      if(isNaN(bcvRate) || bcvRate <= 0) {
        throw new Error('Tasa BCV inválida');
      }
      
      isRateLoaded = true;
      exchangeRates['VES'] = bcvRate;
      
      // Actualizar precios después de obtener la tasa
      updatePrices();
      
    } catch (error) {
      console.error('Error:', error);
      // Fallback a una tasa estimada si falla la API
      bcvRate = 36.5; 
      isRateLoaded = true;
      exchangeRates['VES'] = bcvRate;
      updatePrices();
    }
  }

  // Función para actualizar los precios en la tabla
  function updatePrices() {
    if (!isRateLoaded) return;
    
    priceCells.forEach(row => {
      const priceUsd = parseFloat(row.getAttribute('data-price-usd'));
      const priceCell = row.querySelector('.price');
      const bcvCell = row.querySelector('.price-bolivares');
      
      if (!isNaN(priceUsd)) {
        // Calcular nuevo precio en la moneda seleccionada
        const rate = exchangeRates[currentCurrency];
        const newPrice = (priceUsd * rate).toFixed(2);
        
        // Simbolos
        const symbols = {
          'USD': '$', 'EUR': '€', 'GBP': '£', 'MXN': '$', 'JPY': '¥', 'VES': 'Bs. '
        };
        
        priceCell.textContent = `${symbols[currentCurrency]}${newPrice} ${currentCurrency}`;
        
        // Siempre mostrar el precio referencial en Bs
        if (bcvCell) {
          const bsPrice = (priceUsd * bcvRate).toFixed(2);
          bcvCell.textContent = `Bs. ${bsPrice}`;
        }
      }
    });
  }

  // Escuchar cambios en el selector de moneda
  if (currencySelect) {
    currencySelect.addEventListener('change', (e) => {
      currentCurrency = e.target.value;
      updatePrices();
    });
  }

  // Iniciar la obtención de la tasa
  fetchBcvRate();
});
