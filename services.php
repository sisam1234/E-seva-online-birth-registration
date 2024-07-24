<?php
// services.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>e-Seva Portal - Services</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <header>
        <h1>e-Seva Portal</h1>
    </header>
    <nav>
        <ul>
            <li><a href="services.php">Services</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        
            <h1>Our Services</h1>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search Services">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="container">
                <div class="card">
                
                    <i class="fas fa-file-alt"></i>
                    <i class="fas fa-baby" style="margin-left: -30px;"></i>
                <a href="birth_registration.php"style="text-decoration:none";>
                    <h2 class="title"style="color:black";>Birth Registration</h2>
                </a>
                </div>
                <div class="card">
                    <i class="fas fa-file-alt"></i>
                    <i class="fas fa-skull" style="margin-left: -35px;"></i>
                <a href="death_registration.php" style="text-decoration:none";>
                    <h2 class="title" style="color:black";>Death Registration</h2>
                </a>
                </div>
                <div class="card">
                    <i class="fas fa-id-card icon"></i>
                    <h2 class="title">Business Registration</h2>
                </div>
                <div class="card">
                    <i class="fas fa-exchange-alt"></i>
                    <h2 class="title">Migration Registration</h2>
                </div>
                <div class="card">
                    <i class="fas fa-male"></i>
                    <i class="fas fa-female" style="margin-left: -30px;"></i>
                    <h2 class="title">Marriage Registration</h2>
                </div>
            </div>
       
    </main>
    <footer>
        <p>&copy; 2023 e-Seva Portal. All rights reserved.</p>
    </footer>
</body>
</html>
