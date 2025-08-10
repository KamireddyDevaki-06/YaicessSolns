<?php
// Database connection
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';
session_start();
$error = '';
$success = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create users table if not exists (for demo purposes)
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(15) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Registration form submitted
        $email = trim($_POST['email']);
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $phone = trim($_POST['phone']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        // Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address.';
        } elseif (empty($firstName) || empty($lastName)) {
            $error = 'First and Last Name are required.';
        } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $error = 'Phone number must be 10 digits.';
        } elseif ($password !== $confirm_password) {
            $error = 'Passwords do not match.';
        } elseif (strlen($password) < 6) {
            $error = 'Password must be at least 6 characters.';
        } else {
            // Check if user exists
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = 'Email already registered.';
            } else {
                // Hash password and insert user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)');
                if ($stmt->execute([$firstName, $lastName, $email, $phone, $hashedPassword])) {
                    $success = 'Registration successful! You can now log in.';
                    $_POST = array('login' => 1, 'email' => $email); // Switch to login tab and prefill email
                } else {
                    $error = 'Registration failed. Please try again.';
                }
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login form submitted
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'first_name' => $user['first_name']
            ];
            header('Location: home.php');
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration/Login</title>
    <style>
        :root {
            --black: #181818;
            --gold: #FFD700;
            --white: #fff;
            --error: #c62828;
            --success: #388e3c;
            --gray: #f5f5f5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        
        body {
            background: var(--black);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-box {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }
        
        .tabs {
            display: flex;
            background: var(--black);
        }
        
        .tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            color: var(--white);
            font-weight: bold;
            transition: all 0.3s;
            position: relative;
        }
        
        .tab.active {
            background: var(--gold);
            color: var(--black);
        }
        
        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gold);
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form {
            display: none;
        }
        
        .form.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--black);
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
        }
        
        .btn {
            width: 100%;
            padding: 14px;
            background: var(--gold);
            color: var(--black);
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn:hover {
            background: #e6c200;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-align: center;
            font-size: 14px;
        }
        
        .error {
            background: #ffebee;
            color: var(--error);
            border: 1px solid var(--error);
        }
        
        .success {
            background: #e8f5e9;
            color: var(--success);
            border: 1px solid var(--success);
        }
        
        @media (max-width: 480px) {
            .auth-box {
                border-radius: 8px;
            }
            
            .form-container {
                padding: 25px;
            }
            
            .tab {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-box">
        <div class="tabs">
            <div class="tab active" data-tab="register">Register</div>
            <div class="tab" data-tab="login">Login</div>
        </div>
        
        <div class="form-container">
            <?php if ($error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="message success"><?php echo $success; ?></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('.tab[data-tab="login"]').click();
                    });
                </script>
            <?php endif; ?>
            
            <!-- Registration Form -->
            <form id="registerForm" class="form active" method="POST" action="">
                <input type="hidden" name="register" value="1">
                
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required 
                           value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required
                           value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required
                           value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                           pattern="[0-9]{10}" title="10 digit phone number">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password (min 6 characters)</label>
                    <input type="password" id="password" name="password" required minlength="6">
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn">Register</button>
            </form>
            
            <!-- Login Form -->
            <form id="loginForm" class="form" method="POST" action="">
                <input type="hidden" name="login" value="1">
                
                <div class="form-group">
                    <label for="login_email">Email</label>
                    <input type="email" id="login_email" name="email" required
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="login_password">Password</label>
                    <input type="password" id="login_password" name="password" required>
                </div>
                
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <script>
        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const forms = document.querySelectorAll('.form');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs and forms
                    tabs.forEach(t => t.classList.remove('active'));
                    forms.forEach(f => f.classList.remove('active'));
                    
                    // Add active class to clicked tab and corresponding form
                    this.classList.add('active');
                    const formId = this.getAttribute('data-tab') + 'Form';
                    document.getElementById(formId).classList.add('active');
                });
            });
            
            // Clear error/success messages when switching tabs
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const messages = document.querySelectorAll('.message');
                    messages.forEach(msg => msg.remove());
                });
            });
        });
    </script>
<?php if (isset($_POST['register'])): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.tab[data-tab="register"]').click();
    });
</script>
<?php endif; ?>
<?php if (isset($_POST['login'])): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.tab[data-tab="login"]').click();
    });
</script>
<?php endif; ?>
</body>
</html>