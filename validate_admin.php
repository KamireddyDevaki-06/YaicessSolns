<?php
session_start();
$user = $_POST['admin_user'];
$pass = $_POST['admin_pass'];

if ($user == "admin" && $pass == "1234") {
    $_SESSION['admin'] = true;
    header("Location: user_list.php");
} else {
    echo "❌ Invalid credentials! <a href='admin_login.html'>Try again</a>";
}
?>
