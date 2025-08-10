<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body {
      background: #121212;
      color: white;
      font-family: Arial;
      text-align: center;
      padding-top: 100px;
    }
    input {
      padding: 10px;
      width: 250px;
      margin: 10px;
    }
    button {
      padding: 10px 20px;
      background: #00c853;
      color: white;
      border: none;
      border-radius: 5px;
    }
    .error {
      color: #ff5252;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h2>Admin Login</h2>
  <?php
  session_start();
  $error = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Update these with your actual DB credentials
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
    }
    $stmt = $conn->prepare('SELECT * FROM admins WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
      $_SESSION['admin'] = $username;
      header('Location: admin-dashboard.html');
      exit();
    } else {
      $error = 'Login failed. Invalid username or password.';
    }
    $stmt->close();
    $conn->close();
  }
  ?>
  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>
</body>
</html>
