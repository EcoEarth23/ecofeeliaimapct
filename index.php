<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFeelia - Sustainable Future</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header -->
    <header>
        <img src="logo.png" alt="EcoFeelia Logo" class="logo">
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Join the Green Revolution</h1>
            <p>Make a difference with sustainable choices.</p>
            <div class="buttons">
                <button class="btn" onclick="showPopup('login-popup')">Login</button>
                <button class="btn" onclick="showPopup('register-popup')">Register</button>
            </div>
        </div>
    </section>

    <!-- Full-screen Overlay -->
    <div class="overlay" id="overlay" onclick="closeAllPopups()"></div>

    <!-- Login Popup -->
    <div class="popup" id="login-popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup('login-popup')">&times;</span>
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username_email" placeholder="Username or Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
                <p>Not registered? <a href="#" onclick="switchPopup('register-popup')">Sign up here</a></p>
            </form>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup" id="register-popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup('register-popup')">&times;</span>
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" class="btn">Register</button>
                <p>Already have an account? <a href="#" onclick="switchPopup('login-popup')">Login here</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

