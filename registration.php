<?php
session_start();
$msg = '';
$active_tab = 'register';

// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if ($password !== $confirm_password) {
            $msg = 'Passwords do not match!';
        } elseif (strlen($password) < 6) {
            $msg = 'Password must be at least 6 characters!';
        } else {
            // Check if email already exists
            $stmt = $conn->prepare('SELECT * FROM user WHERE `email id` = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $msg = 'Email already registered!';
            } else {
                // Insert new user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare('INSERT INTO user (`name`, `phone number`, `email id`, `password`) VALUES (?, ?, ?, ?)');
                $full_name = $first_name . ' ' . $last_name;
                $stmt->bind_param('ssss', $full_name, $phone, $email, $hashed_password);
                if ($stmt->execute()) {
                    $_SESSION['user'] = [
                        'name' => $full_name,
                        'email' => $email
                    ];
                    header('Location: home.php');
                    exit();
                } else {
                    $msg = 'Registration failed. Please try again.';
                }
            }
        }
        $active_tab = 'register';
    } elseif (isset($_POST['login'])) {
        $login_email = trim($_POST['login_email']);
        $login_password = $_POST['login_password'];
        $stmt = $conn->prepare('SELECT * FROM user WHERE `email id` = ?');
        $stmt->bind_param('s', $login_email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($login_password, $user['password'])) {
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email id']
                ];
                header('Location: home.php');
                exit();
            } else {
                $msg = 'Invalid password!';
            }
        } else {
            $msg = 'No user found with this email!';
        }
        $active_tab = 'login';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register / Login</title>
    <style>
        :root {
            --black: #181818;
            --gold: #FFD700;
            --white: #fff;
            --gray: #222;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--black);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: var(--gray);
            padding: 30px 25px 20px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.4);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--gold);
            letter-spacing: 1px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--gold);
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--gold);
            border-radius: 6px;
            background: var(--black);
            color: var(--white);
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px var(--gold);
        }
        button {
            padding: 12px;
            background: var(--gold);
            color: var(--black);
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.2s;
        }
        button:hover {
            background: #e6c200;
        }
        .switch {
            text-align: center;
            margin-top: 10px;
        }
        .switch a {
            color: var(--gold);
            text-decoration: none;
            font-weight: bold;
        }
        .switch a:hover {
            text-decoration: underline;
        }
        .hidden {
            display: none;
        }
        /* Message styling */
        .message {
            color: #fff;
            background: #333;
            border-left: 5px solid var(--gold);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            text-align: center;
        }
    </style>
    <script>
        function showForm(form) {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById(form).classList.remove('hidden');
        }
        window.onload = function() {
            <?php if ($active_tab === 'login'): ?>
                showForm('loginForm');
            <?php else: ?>
                showForm('registerForm');
            <?php endif; ?>
        };
    </script>
</head>
<body>
    <div class="container">
        <?php if ($msg): ?>
            <div style="color: red; text-align:center; margin-bottom: 10px;">
                <?php echo htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>
        <div id="registerForm">
            <h2>Register</h2>
            <form method="POST">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password (min 6 characters)</label>
                <input type="password" id="password" name="password" minlength="6" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" minlength="6" required>

                <button type="submit" name="register">Register</button>
            </form>
            <div class="switch">
                Already have an account? <a href="#" onclick="showForm('loginForm')">Login</a>
            </div>
        </div>
        <div id="loginForm" class="hidden">
            <h2>Login</h2>
            <form method="POST">
                <label for="login_email">Email</label>
                <input type="email" id="login_email" name="login_email" required>

                <label for="login_password">Password</label>
                <input type="password" id="login_password" name="login_password" required>

                <button type="submit" name="login">Login</button>
            </form>
            <div class="switch">
                Don't have an account? <a href="#" onclick="showForm('registerForm')">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
    

