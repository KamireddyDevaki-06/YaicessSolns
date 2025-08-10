
<?php
$showProfile = basename($_SERVER['PHP_SELF']) !== 'index.php';
$profile = null;
if ($showProfile && isset($_SESSION['user'])) {
    $host = 'localhost';
    $db = 'test';
    $user = 'root';
    $pass = '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT First_Name, Last_Name, Email FROM users WHERE Email = ?');
        $stmt->execute([$_SESSION['user']['email']]);
        $profile = $stmt->fetch();
    } catch (PDOException $e) {
        $profile = null;
    }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --primary-bg: #111;
    --gold: #FFD700;
    --gold-hover: #FFEE99;
    --dark-gray: #232323;
    --white: #FFFFFF;
    --blue: #00BFFF;
    --light-blue: #00D8FF;
    --red: #FF4D4D;
    --light-red: #FF6B6B;
  }
  
  .navbar {
    background: var(--primary-bg);
    color: var(--gold);
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    font-family: 'Montserrat', Arial, sans-serif;
    position: sticky;
    top: 0;
    z-index: 1000;
  }
  
  .navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: 80px;
    max-width: 1400px;
    margin: 0 auto;
  }
  
  .logo {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--gold);
    letter-spacing: 1.5px;
  }
  
  .nav-links ul {
    list-style: none;
    display: flex;
    gap: 30px;
    margin: 0;
    padding: 0;
  }
  
  .nav-links a {
    color: var(--gold);
    text-decoration: none;
    font-size: 1.15rem;
    font-weight: 600;
    padding: 10px 15px;
    border-radius: 6px;
    transition: all 0.3s ease;
  }
  
  .nav-links a:hover {
    background: rgba(255, 215, 0, 0.1);
  }
  
  .profile-dropdown {
    position: relative;
    display: inline-block;
  }
  
  .profile-btn {
    background: var(--gold);
    color: var(--primary-bg);
    border: none;
    border-radius: 25px;
    padding: 12px 24px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
  }
  
  .profile-btn:hover {
    background: var(--dark-gray);
    color: var(--gold);
  }
  
  .profile-content {
    display: none;
    position: absolute;
    right: 0;
    background: var(--dark-gray);
    min-width: 240px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    z-index: 1000;
    padding: 20px;
    margin-top: 10px;
  }
  
  .profile-dropdown.show .profile-content {
    display: block;
    animation: fadeIn 0.3s;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .profile-info {
    color: var(--white);
    margin-bottom: 15px;
  }
  
  .profile-name {
    font-weight: 700;
    color: var(--gold);
    margin-bottom: 5px;
  }
  
  .profile-email {
    font-size: 0.9rem;
    opacity: 0.8;
  }
  
  .profile-actions {
    border-top: 1px solid rgba(255,255,255,0.1);
    padding-top: 15px;
  }
  
  .profile-actions a {
    display: block;
    color: var(--white);
    padding: 8px 0;
    text-decoration: none;
    transition: all 0.2s;
  }
  
  .profile-actions a:hover {
    color: var(--gold);
    padding-left: 5px;
  }
  
  .profile-actions a i {
    margin-right: 8px;
    width: 20px;
    text-align: center;
  }
</style>
<header class="navbar">
    <div class="container">
        <div class="logo">YAICESS SOLUTIONS</div>
        <nav class="nav-links">
            <ul>
                <li><a href="home.php"<?php if(basename($_SERVER['PHP_SELF'])=='home.php') echo ' class="active"'; ?>>HOME</a></li>
                <li><a href="speakers.php"<?php if(basename($_SERVER['PHP_SELF'])=='speakers.php') echo ' class="active"'; ?>>SPEAKERS</a></li>
                <li><a href="agenda.php"<?php if(basename($_SERVER['PHP_SELF'])=='agenda.php') echo ' class="active"'; ?>>AGENDA</a></li>
                <li><a href="venue.php"<?php if(basename($_SERVER['PHP_SELF'])=='venue.php') echo ' class="active"'; ?>>VENUE</a></li>
                <li><a href="contact.php"<?php if(basename($_SERVER['PHP_SELF'])=='contact.php') echo ' class="active"'; ?>>CONTACT</a></li>
            </ul>
        </nav>
        <?php if ($showProfile && $profile): ?>
        <div class="profile-dropdown" id="profileDropdownHeader">
            <button class="profile-btn" onclick="toggleProfileDropdownHeader()">
                <i class="fas fa-user-circle"></i>
                <?php echo htmlspecialchars($profile['First_Name'] . ' ' . $profile['Last_Name']); ?>
                <i class="fas fa-caret-down"></i>
            </button>
            <div class="profile-content">
                <div class="profile-label">Name</div>
                <div class="profile-value"><?php echo htmlspecialchars($profile['First_Name'] . ' ' . $profile['Last_Name']); ?></div>
                <div class="profile-label">Email</div>
                <div class="profile-value"><?php echo htmlspecialchars($profile['Email']); ?></div>
                <a href="edit_profile.php" class="profile-edit">Edit Profile</a>
                <a href="logout.php" class="profile-logout">Logout</a>
            </div>
        </div>
        <script>
          function toggleProfileDropdownHeader() {
            document.getElementById('profileDropdownHeader').classList.toggle('show');
          }
          window.onclick = function(event) {
            if (!event.target.matches('.profile-btn')) {
              var dropdowns = document.getElementsByClassName('profile-dropdown');
              for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
        </script>
        <?php endif; ?>
    </div>
</header>