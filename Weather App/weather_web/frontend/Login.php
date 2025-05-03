<?php
session_start();
include '../backend/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $sql = "SELECT * FROM `signup` WHERE `Email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Password check (plain match, should hash in production)
        if ($password == $row['Password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            header("Location: HomePage.php");
            exit();
        }
    }
    echo "<script>alert('Invalid email or password'); window.location.href='Login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Login.css">
</head>
<body>

<div class="container">
    <div class="form-header">
        <h1>Welcome Back!</h1>
        <p>Login to access your Weather Dashboard</p>
    </div>

    <form action="Login.php" method="post" id="loginForm">
        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="Password" placeholder="Password" required>
        
        <!--  Remember Me checkbox -->
        <label style="display: flex; align-items: center; gap: 5px; margin-bottom: 10px;">
            <input type="checkbox" id="rememberEmail"> Remember Me
        </label>

        <button type="submit">Login</button>
    </form>

    <div class="form-footer">
        <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
    </div>
</div>

<!-- JavaScript for localStorage -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.querySelector("input[name='Email']");
    const rememberCheckbox = document.getElementById("rememberEmail");

    // Load saved email if available
    const savedEmail = localStorage.getItem("weatherAppEmail");
    if (savedEmail) {
        emailInput.value = savedEmail;
        rememberCheckbox.checked = true;
    }

    // Save email to localStorage on form submit if "Remember Me" is checked
    document.getElementById("loginForm").addEventListener("submit", function () {
        if (rememberCheckbox.checked) {
            localStorage.setItem("weatherAppEmail", emailInput.value);
        } else {
            localStorage.removeItem("weatherAppEmail");
        }
    });
});
</script>

</body>
</html>
