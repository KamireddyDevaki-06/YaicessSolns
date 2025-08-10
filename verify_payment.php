<?php
require __DIR__.'/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

$data = json_decode(file_get_contents('php://input'), true);
$api = new Api('rzp_test_YOUR_KEY_ID', 'YOUR_TEST_KEY_SECRET');

try {
    $attributes = [
        'razorpay_order_id'   => $data['razorpay_order_id'],
        'razorpay_payment_id' => $data['razorpay_payment_id'],
        'razorpay_signature'  => $data['razorpay_signature']
    ];
    
    $api->utility->verifyPaymentSignature($attributes);
    
    // Payment successful - save to database
    file_put_contents('payments.log', 
        "SUCCESS: {$data['razorpay_payment_id']}\n", 
        FILE_APPEND
    );
} catch (Exception $e) {
    // Payment failed
    file_put_contents('payments.log', 
        "FAILED: {$data['razorpay_payment_id']} - {$e->getMessage()}\n", 
        FILE_APPEND
    );
}
?>