<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Speakers | YAICESS SOLUTIONS</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="hari.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #111;
            --secondary: #FFD700;
            --accent: #FFD700;
            --highlight: #FFD700;
            --text: #fff;
            --text-secondary: #FFD700;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: var(--primary);
            color: var(--text);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Speakers Section */
        .speakers-section {
            padding: 80px 0;
            background: var(--primary);
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--secondary);
            position: relative;
            display: inline-block;
        }
        
        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary);
        }
        
        .section-header p {
            color: var(--text-secondary);
            max-width: 600px;
            margin: 20px auto 0;
            font-size: 1.1rem;
        }
        
        .speakers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
        
        .speaker-card {
            background: #232323;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--secondary);
        }
        
        .speaker-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border-color: var(--highlight);
        }
        
        .speaker-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--secondary);
            margin: 0 auto 20px;
            display: block;
        }
        
        .speaker-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--secondary);
        }
        
        .speaker-title {
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
        }
        
        .social-links a {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--secondary);
            color: var(--primary);
            transform: scale(1.1);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .speakers-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main class="speakers-section">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Speakers</h2>
                <p>Learn from the brightest minds in technology.</p>
            </div>
            
            <div class="speakers-grid">
                <!-- Speaker cards with API photos -->
                <div class="speaker-card">
                    <img id="speaker1-photo" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dr. Sarah Johnson" class="speaker-photo">
                    <h3 class="speaker-name">Dr. Sarah Johnson</h3>
                    <p class="speaker-title">Chief AI Scientist</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
                <div class="speaker-card">
                    <img id="speaker2-photo" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="speaker-photo">
                    <h3 class="speaker-name">Michael Chen</h3>
                    <p class="speaker-title">Church and Communications Board</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
                <div class="speaker-card">
                    <img id="speaker3-photo" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Priya Patel" class="speaker-photo">
                    <h3 class="speaker-name">Priya Patel</h3>
                    <p class="speaker-title">Cybersecurity Director</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>