<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("Access Denied. Please <a href='admin_login.html'>login</a>.");
}

include '../connection.php';

$result = mysqli_query($conn, "SELECT * FROM users");
$total = mysqli_num_rows($result);

echo "<h2>Total Registered Users: $total</h2>";
echo "<table border='1' cellpadding='10'>
<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
}
echo "</table>";
?>
