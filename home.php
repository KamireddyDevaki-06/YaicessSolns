<?php
// Set page title and description
$pageTitle = "Professional Business Solutions";
$pageDescription = "We deliver innovative solutions to help your business grow and succeed in today's competitive market.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏢</text></svg>">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        /* Base Styles */
        :root {
            --primary-color: #000000;       /* Black */
            --secondary-color: #FFD700;     /* Gold */
            --accent-color: #C0A343;        /* Darker gold */
            --text-color: #333333;
            --light-text: #FFFFFF;
            --dark-text: #111111;
            --gray-bg: #F5F5F5;
            --dark-bg: #1A1A1A;
            --section-padding: 80px 0;
            --container-width: 1200px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #FFFFFF;
            padding-top: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            line-height: 1.2;
            color: var(--dark-text);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: var(--dark-text);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--light-text);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-color);
            color: var(--dark-text);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: var(--light-text);
        }

        .btn-light {
            background-color: var(--light-text);
            color: var(--primary-color);
            border-color: var(--light-text);
        }

        .btn-light:hover {
            background-color: transparent;
            color: var(--light-text);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 36px;
            margin-bottom: 15px;
            color: var(--primary-color);
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
            background-color: var(--secondary-color);
        }

        .section-header p {
            font-size: 18px;
            color: #666;
        }

        /* Header Styles */
        .main-header {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .main-nav ul {
            display: flex;
            list-style: none;
        }

        .main-nav ul li {
            margin-left: 30px;
            position: relative;
        }

        .main-nav ul li a {
            color: var(--light-text);
            font-weight: 500;
            position: relative;
        }

        .main-nav ul li a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--secondary-color);
            transition: width 0.3s ease;
        }

        .main-nav ul li a:hover::after,
        .main-nav ul li.active a::after {
            width: 100%;
        }

        .header-cta .btn {
            margin-left: 20px;
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--light-text);
        }

        .mobile-menu {
            display: none;
            background-color: var(--primary-color);
            padding: 20px;
            position: absolute;
            width: 100%;
            left: 0;
            top: 100%;
            z-index: 999;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu ul {
            list-style: none;
        }

        .mobile-menu ul li {
            margin-bottom: 15px;
        }

        .mobile-menu ul li a {
            color: var(--light-text);
            font-weight: 500;
        }

        /* Hero Section */
        .hero {
            padding: 100px 0;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            color: var(--light-text);
        }

        .hero .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-content {
            flex: 1;
            padding-right: 50px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--light-text);
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.8);
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            flex: 1;
            display: none; /* Hide on all screens initially */
        }

        /* About Section */
        .about-section {
            padding: var(--section-padding);
            background-color: var(--gray-bg);
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 28px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .about-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .about-features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .about-features li i {
            color: var(--secondary-color);
            margin-right: 10px;
            font-size: 18px;
        }

        .about-image {
            flex: 1;
            text-align: center;
        }

        .about-image img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Services Section */
        .services-section {
            padding: var(--section-padding);
            background-color: var(--light-text);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background-color: var(--light-text);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            border-top: 4px solid var(--secondary-color);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .service-icon i {
            font-size: 36px;
            color: var(--secondary-color);
        }

        .service-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .service-card p {
            margin-bottom: 20px;
        }

        .read-more {
            color: var(--secondary-color);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .read-more i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .read-more:hover i {
            transform: translateX(5px);
        }

        .section-cta {
            text-align: center;
            margin-top: 50px;
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: var(--section-padding);
            background-color: var(--gray-bg);
        }

        .testimonials-slider {
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial {
            background-color: var(--light-text);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            position: relative;
        }

        .testimonial::before {
            content: '\201C';
            font-size: 80px;
            color: rgba(255, 215, 0, 0.2);
            position: absolute;
            top: 10px;
            left: 20px;
            font-family: serif;
            line-height: 1;
        }

        .testimonial-content {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .testimonial-content p {
            font-size: 18px;
            font-style: italic;
            color: #555;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .testimonial-author img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px solid var(--secondary-color);
        }

        .author-info h4 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .author-info p {
            color: #777;
            font-size: 14px;
        }

        /* CTA Section */
        .cta-section {
            padding: var(--section-padding);
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            color: var(--light-text);
            text-align: center;
        }

        .cta-content h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: var(--light-text);
        }

        .cta-content p {
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer Styles */
        .main-footer {
            background-color: var(--dark-bg);
            color: var(--light-text);
            padding: 80px 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-col h3 {
            font-size: 20px;
            margin-bottom: 25px;
            color: var(--secondary-color);
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .footer-col p {
            margin-bottom: 20px;
            color: #aaa;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--light-text);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--secondary-color);
            color: var(--dark-text);
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: #aaa;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }

        .contact-info li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #aaa;
        }

        .contact-info li i {
            margin-right: 10px;
            color: var(--secondary-color);
            width: 20px;
            text-align: center;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            text-align: center;
        }

        .copyright {
            margin-bottom: 10px;
            color: #777;
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-links a {
            color: #777;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--secondary-color);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--secondary-color);
            color: var(--dark-text);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            cursor: pointer;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--accent-color);
            color: var(--light-text);
        }

        /* Responsive Styles */
        @media (min-width: 992px) {
            .hero-image {
                display: block; /* Show hero image on larger screens */
            }
        }

        @media (max-width: 992px) {
            .hero .container {
                flex-direction: column;
            }
            
            .hero-content {
                text-align: center;
                padding-right: 0;
                margin-bottom: 40px;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .about-content {
                flex-direction: column;
            }
            
            .about-text {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 768px) {
            .main-nav {
                display: none;
            }
            
            .header-cta {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .mobile-menu.active {
                display: block;
            }
            
            .hero {
                padding: 120px 0 60px;
            }
            
            .hero-content h1 {
                font-size: 36px;
            }
            
            .section-header h2 {
                font-size: 30px;
            }
            
            .testimonial-author {
                flex-direction: column;
                text-align: center;
            }
            
            .testimonial-author img {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px 0;
            }
            
            .hero-content h1 {
                font-size: 28px;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
            
            .section-header h2 {
                font-size: 26px;
            }
            
            .cta-content h2 {
                font-size: 28px;
            }
        }
        <a href="registration.php" class="btn btn-primary">Register Now</a>
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Professional Solutions for Your Business</h1>
                    <p>We deliver innovative solutions to help your business grow and succeed in today's competitive market.</p>
                    <div class="hero-buttons">
                        <a href="services.php" class="btn btn-primary">Our Services</a>
                        <a href="contact.php" class="btn btn-secondary">Contact Us</a>
                    </div>
                </div>
                <div class="hero-image">
                    <!-- Image will be shown via CSS on larger screens -->
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="section-header">
                    <h2>About Our Company</h2>
                    <p>With over 15 years of experience in the industry</p>
                </div>
                <div class="about-content">
                    <div class="about-text">
                        <h3>We Provide the Best Solutions</h3>
                        <p>Our company specializes in delivering top-notch business solutions tailored to your specific needs. We combine innovation with proven strategies to help your business thrive.</p>
                        <ul class="about-features">
                            <li><i class="fas fa-check-circle"></i> Professional Team</li>
                            <li><i class="fas fa-check-circle"></i> Quality Services</li>
                            <li><i class="fas fa-check-circle"></i> 24/7 Support</li>
                            <li><i class="fas fa-check-circle"></i> Custom Solutions</li>
                            <li><i class="fas fa-check-circle"></i> Proven Results</li>
                        </ul>
                        <a href="about.php" class="btn btn-outline">Learn More</a>
                    </div>
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Our team working">
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services-section">
            <div class="container">
                <div class="section-header">
                    <h2>Our Services</h2>
                    <p>We offer a wide range of professional services</p>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Business Strategy</h3>
                        <p>Comprehensive business planning and strategy development to position your company for long-term success.</p>
                        <a href="service-detail.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Web Development</h3>
                        <p>Custom website development that delivers exceptional user experiences and drives conversions.</p>
                        <a href="service-detail.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Apps</h3>
                        <p>Innovative mobile applications designed to engage your customers and streamline operations.</p>
                        <a href="service-detail.php" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="section-cta">
                    <a href="services.php" class="btn btn-primary">View All Services</a>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section">
            <div class="container">
                <div class="section-header">
                    <h2>What Our Clients Say</h2>
                    <p>We've helped hundreds of companies achieve their goals</p>
                </div>
                <div class="testimonials-slider">
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Working with this team transformed our business. Their strategic insights and technical expertise helped us increase revenue by 150% in just one year."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
                            <div class="author-info">
                                <h4>John Smith</h4>
                                <p>CEO, Tech Innovations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Grow Your Business?</h2>
                    <p>Contact us today to discuss how we can help you achieve your goals and take your business to the next level.</p>
                    <a href="contact.php" class="btn btn-light">Get Started</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col about-col">
                    <div class="footer-logo">GOLDENBLACK</div>
                    <p>We deliver innovative solutions to help your business grow and succeed in today's competitive market.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-col links-col">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-col services-col">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="service-detail.php">Business Strategy</a></li>
                        <li><a href="service-detail.php">Web Development</a></li>
                        <li><a href="service-detail.php">Mobile Apps</a></li>
                        <li><a href="service-detail.php">Digital Marketing</a></li>
                        <li><a href="service-detail.php">SEO Services</a></li>
                        <li><a href="service-detail.php">Graphic Design</a></li>
                    </ul>
                </div>
                
                <div class="footer-col contact-col">
                    <h3>Contact Us</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Business Ave, Suite 456, New York, NY 10001</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@goldenblack.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> GoldenBlack. All Rights Reserved.</p>
                </div>
                <div class="footer-links">
                    <a href="privacy.php">Privacy Policy</a>
                    <a href="terms.php">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
    
    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('active');
        });
        
        // Close mobile menu when clicking a link
        document.querySelectorAll('.mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelector('.mobile-menu').classList.remove('active');
            });
        });
        
        // Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Simple testimonial slider (could be enhanced with a proper slider library)
        const testimonials = [
            {
                quote: "Working with this team transformed our business. Their strategic insights and technical expertise helped us increase revenue by 150% in just one year.",
                name: "John Smith",
                title: "CEO, Tech Innovations",
                image: "https://randomuser.me/api/portraits/men/32.jpg"
            },
            {
                quote: "The mobile app they developed for us exceeded all expectations. User engagement has skyrocketed and customer satisfaction is at an all-time high.",
                name: "Sarah Johnson",
                title: "Marketing Director, Retail Corp",
                image: "https://randomuser.me/api/portraits/women/44.jpg"
            },
            {
                quote: "Their business strategy services helped us pivot during a difficult market period. We're now more profitable than ever before.",
                name: "Michael Chen",
                title: "Founder, Startup Ventures",
                image: "https://randomuser.me/api/portraits/men/75.jpg"
            }
        ];
        
        let currentTestimonial = 0;
        const testimonialElement = document.querySelector('.testimonial');
        const testimonialContent = document.querySelector('.testimonial-content p');
        const testimonialAuthorImg = document.querySelector('.testimonial-author img');
        const authorInfo = document.querySelector('.author-info');
        
        function updateTestimonial() {
            const testimonial = testimonials[currentTestimonial];
            testimonialContent.textContent = testimonial.quote;
            testimonialAuthorImg.src = testimonial.image;
            testimonialAuthorImg.alt = testimonial.name;
            authorInfo.innerHTML = `<h4>${testimonial.name}</h4><p>${testimonial.title}</p>`;
            
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
        }
        
        // Change testimonial every 5 seconds
        setInterval(updateTestimonial, 5000);
        
        // Initialize first testimonial
        updateTestimonial();
    </script>
</body>
</html>