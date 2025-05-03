<?php

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include '../backend/db_connect.php';

    $username = $_POST["Text"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $Sql = "SELECT * FROM `signup` WHERE `Email` = '$email'";
    $result = mysqli_query($conn, $Sql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        $showError = "Email already exists. Please try another.";
    } else {
        $sql = "INSERT INTO `signup` (`Text`, `Email`, `Password`) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
        alert('Account created successfully!');
        window.location.href='Login.php'; 
      </script>";

            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App - Sign Up</title>
    <link rel="stylesheet" href="Signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
<?php
if ($showAlert) {
    echo "<script>alert('Account created successfully!');</script>";
}
if ($showError) {
    echo "<script>alert('$showError');</script>";
}
?>


    <div class="container">
        <!-- Sign-up Form -->
        <div class="form-header">
            <h1>Create Account</h1>
            <p>Sign up to start using the Weather App</p>
        </div>
        <form action="signup.php" method="post"> 
        <input type="text" name="Text" placeholder="Full Name" required>
            <input type="email" name="Email" placeholder="Email" required>
            <input type="password" name="Password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>

        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>





    <script>
    document.querySelector("form").addEventListener("submit", function(e) {
        const name = document.querySelector("input[name='Text']").value;
        const email = document.querySelector("input[name='Email']").value;

        // Save name and email to localStorage
        localStorage.setItem("weatherAppName", name);
        localStorage.setItem("weatherAppEmail", email);

        // Never store passwords in localStorage
    });
    </script>

</body>
</html>


</body>

</html>
