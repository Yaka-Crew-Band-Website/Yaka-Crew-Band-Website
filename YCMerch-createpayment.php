


<?php
// YCMerch-createpayment.php (TEST MODE)
require __DIR__ . '/vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51Rz9cXAlz3HCjY3AehelwnEGyJe19GrsqAsiup4Y6saRx79bz3sDNtF5yAlcGA7xWxtgHwgACSROnyMH9LDoO3yH00ph8D0JF6'); // <-- TODO: replace

header('Content-Type: application/json');


try {

  
  $input = json_decode(file_get_contents('php://input'), true) ?: [];
  $subtotal_lkr = isset($input['subtotal_lkr']) ? floatval($input['subtotal_lkr']) : 0.0;

  // ⚠️ TEST ONLY: convert LKR → USD for Stripe test charges
  // Replace this with proper currency logic when you move to a live processor.
  $TEST_RATE_LKR_PER_USD = 300.0; // placeholder
  $amount_usd = max(0.5, $subtotal_lkr / $TEST_RATE_LKR_PER_USD); // min $0.50 for demo
  $amount_cents = (int) round($amount_usd * 100);

  // Create PaymentIntent in USD (test)
  $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount_cents,
    'currency' => 'usd',
    'metadata' => [
      'source' => 'yaka_crew_demo',
      'subtotal_lkr' => number_format($subtotal_lkr, 2, '.', ''),
    ],
    // Elements + cards
    'payment_method_types' => ['card'],

    
  ]);

  echo json_encode(['clientSecret' => $intent->client_secret]);
} catch (\Stripe\Exception\ApiErrorException $e) {
  http_response_code(400);
  echo json_encode(['error' => $e->getMessage()]);
} catch (\Throwable $e) {
  http_response_code(500);
  echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);

  
}



