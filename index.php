<?php
session_start(); // This must be at the very top of your script before any output.

// Initialize the session arrays if they don't exist
if (!isset($_SESSION['em'])) {
    $_SESSION['em'] = [];
}

if (!isset($_SESSION['pass'])) {
    $_SESSION['pass'] = [];
}

if (isset($_POST['submit'])) {
    $e = false;
    $p = false;

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Improved check: Searching for the email and password in the session arrays
    $key = array_search($email, $_SESSION['em']); // Find key of the email in the array

    // Check if email exists and password at that key matches
    if ($key !== false && isset($_SESSION['pass'][$key]) && password_verify($password, $_SESSION['pass'][$key])) {
        header("location: ./App/29_FinishingGame/TickTickFinal/TickTick.html");
        exit();
    }
}

if (isset($_POST['sign'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    if (in_array($email, $_SESSION['em'])) {
        echo "Email already registered.";
    } else {
        // Add email and hashed password to session arrays
        $_SESSION['em'][] = $email;
        $_SESSION['pass'][] = password_hash($password, PASSWORD_DEFAULT); // Hash the password before storing it
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="sign" name="sign">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>