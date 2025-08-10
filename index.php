<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | GoldenBlack Business Solutions</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏢</text></svg>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            min-width: 100vw;
            font-family: 'Roboto', Arial, sans-serif;
            overflow: hidden;
        }
        .bg-blur {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            width: 100vw; height: 100vh;
            background: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            filter: blur(8px) brightness(0.7);
            z-index: 1;
        }
        .center-content {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }
        .register-box {
            background: rgba(0,0,0,0.5);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            padding: 48px 36px 40px 36px;
            text-align: center;
            min-width: 320px;
        }
        .register-box h1 {
            color: #FFD700;
            font-size: 2.5rem;
            margin-bottom: 18px;
            letter-spacing: 1px;
        }
        .register-box p {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 32px;
        }
        .register-btn {
            background: linear-gradient(90deg, #FFD700 0%, #C0A343 100%);
            color: #111;
            font-size: 1.3rem;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 18px 60px;
            box-shadow: 0 0 30px 5px #FFD70099;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .register-btn:hover {
            background: linear-gradient(90deg, #C0A343 0%, #FFD700 100%);
            color: #000;
            box-shadow: 0 0 40px 10px #FFD700cc;
        }
        @media (max-width: 600px) {
            .register-box {
                padding: 28px 10px 24px 10px;
                min-width: 0;
            }
            .register-box h1 {
                font-size: 1.5rem;
            }
            .register-btn {
                font-size: 1rem;
                padding: 12px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-blur"></div>
    <div class="center-content">
        <div class="register-box">
            <h1>Welcome to YAICESS SOLUTIONS</h1>
            <p>Access premium business solutions and services.<br>Click below to register now.</p>
            <a href="registration.php" class="register-btn">Register Now</a>
        </div>
    </div>
</body>
</html>