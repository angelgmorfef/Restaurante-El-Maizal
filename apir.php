<?php
require_once 'config.php';
require 'asset/plugins/vendor/autoload.php';

use Stripe\StripeClient;

// Inicializa el cliente de Stripe con la clave configurada centralmente
$stripe = new Stripe\StripeClient(config: STRIPE_SECRET_KEY);

try {
    // Obtener los datos del JSON
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);
    
    // Calcular el monto (Stripe espera el monto en la unidad más pequeña, ej: centavos)
    $amount = 500; // default 5 usd
    if (isset($jsonObj->items) && isset($jsonObj->items[0]->amount)) {
        $amount = intval($jsonObj->items[0]->amount * 100);
    }

    $paymentIntent = $stripe->paymentIntents->create(params: [
      'amount' => $amount,
      'currency' => CURRENCY,
      'payment_method' => 'pm_card_visa',
      'payment_method_types' => ['card'],
    ]);
    
    // Envía el client_secret al front-end (por ejemplo, en formato JSON)
    echo json_encode(value: [
      'clientSecret' => $paymentIntent->client_secret,
    ]);
    
} catch (\Stripe\Exception\ApiErrorException $e) {
    echo json_encode(value: [
      'error' => $e->getMessage()
    ]);
}

?>
