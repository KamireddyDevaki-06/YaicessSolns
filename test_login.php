<?php
// Simple test to verify login redirect
session_start();

// Test data - simulate a successful login
$_SESSION['user'] = [
    'id' => 1,
    'email' => 'test@example.com',
    'first_name' => 'Test'
];

// Redirect to home.php
header('Location: home.php');
exit();
?>
