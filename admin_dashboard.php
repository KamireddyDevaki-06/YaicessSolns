<?php
require_once('db_connect.php');

try {
    // Count total successful registrations
    $countSql = "SELECT COUNT(*) FROM registrations WHERE transaction_status = 'SUCCESS'";
    $countStmt = $pdo->query($countSql);
    $totalSuccess = $countStmt->fetchColumn();

    // Get all registrations
    $allSql = "SELECT * FROM registrations ORDER BY created_at DESC";
    $allStmt = $pdo->query($allSql);
    $registrations = $allStmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 900px; margin: auto; }
        h1, h2 { color: #333; }
        .success-count { font-size: 2em; font-weight: bold; color: green; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Total Successful Registrations: <span class="success-count"><?php echo $totalSuccess; ?></span></h2>

        <h2>All Registrations</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $reg): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reg['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($reg['email']); ?></td>
                    <td><?php echo htmlspecialchars($reg['phone']); ?></td>
                    <td><?php echo htmlspecialchars($reg['transaction_status']); ?></td>
                    <td><?php echo htmlspecialchars($reg['created_at']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>