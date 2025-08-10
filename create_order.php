<?php
require __DIR__.'/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api('rzp_test_YOUR_KEY_ID', 'YOUR_TEST_KEY_SECRET');

$data = json_decode(file_get_contents('php://input'), true);
$amount = $data['amount'] ?? 10000; // Default ₹100

$order = $api->order->create([
    'amount'   => $amount,
    'currency' => 'INR',
    'receipt'  => 'order_'.uniqid()
]);

header('Content-Type: application/json');
echo json_encode([
    'id'     => $order->id,
    'amount' => $order->amount
]);
?>