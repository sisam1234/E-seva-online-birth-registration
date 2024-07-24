<?php
@include 'config.php';
@include 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['register'])) {
        if (registerUser($username, $password, $conn)) {
            echo "Registration successful!";
        } else {
            echo "Registration failed!";
        }
    } elseif (isset($_POST['login'])) {
        if (loginUser($username, $password, $conn)) {
            header("Location: services.php");
            exit;
        } else {
            echo "Login failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>e-Seva Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <header>
        <h1>e-Seva Portal</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Welcome to e-Seva Portal</h2>
            <p>This portal provides various online services to citizens.</p>
            <div class="form-container" id="form-container">
                <h2>Login</h2>
                <form action="index.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                </form>
                <p>Don't have an account? <a href="#" onclick="switchToRegister()">Register here</a></p>
            </div>
            <div class="form-container" id="register-container" style="display: none;">
                <h2>Register</h2>
                <form action="index.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="register">Register</button>
                </form>
                <p>Already have an account? <a href="#" onclick="switchToLogin()">Login here</a></p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 e-Seva Portal. All rights reserved.</p>
    </footer>
    <script>
        function switchToRegister() {
            document.getElementById('form-container').style.display = 'none';
            document.getElementById('register-container').style.display = 'block';
        }

        function switchToLogin() {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('register-container').style.display = 'none';
        }
    </script>
</body>
</html>
