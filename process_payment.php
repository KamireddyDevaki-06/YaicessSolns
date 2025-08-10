<?php
// process_payment.php
session_start();
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';
$response = ['success' => false, 'message' => ''];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $status = 'initiated';
    $initiated = date('Y-m-d H:i:s');
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Insert payment record with initiated status and timestamp
        $stmt = $pdo->prepare('INSERT INTO payments (Name, Email, payment_initiated, payment_status) VALUES (?, ?, ?, ?)');
        $stmt->execute([$name, $email, $initiated, $status]);
        // Simulate payment success by updating status
        $stmt2 = $pdo->prepare('UPDATE payments SET payment_status = ? WHERE Email = ? AND payment_initiated = ?');
        $stmt2->execute(['successful', $email, $initiated]);
        $response['success'] = true;
        $response['message'] = 'Payment recorded.';
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
}
header('Content-Type: application/json');
echo json_encode($response);
