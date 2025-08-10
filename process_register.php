<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "✅ Registered Successfully. <a href='user_register.html'>Back</a>";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
?>
