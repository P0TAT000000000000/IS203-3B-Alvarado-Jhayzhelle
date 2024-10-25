<?php
session_start(); // Start a session to store user data
require('./database2.php'); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query = "SELECT id, firstName, password FROM admin.admintable WHERE email = ?";
    
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $Email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_id, $firstName, $hashedPassword);
        
        if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($Password, $hashedPassword)) {
                $_SESSION['user_id'] = $user_id; // Store user_id in session
                $_SESSION['user_email'] = $Email; // Store user email in session
                $_SESSION['user_name'] = $firstName; // Store user's first name in session
                echo '<script>alert("Login Successful!"); window.location.href = "Index.php";</script>';
            } else {
                echo '<script>alert("Invalid email or password.");</script>';
            }
        } else {
            echo '<script>alert("No user found with that email.");</script>';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Error in SQL preparation: ' . mysqli_error($connection) . '");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('images/Bg7.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 350px;
        }
        .site-title {
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: "Lucida Handwriting";
            color: white;
            font-size: 50px;
            font-weight: 600;
        }
        h2 {
            font-family: "Lucida Handwriting";
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
            color: #333;
        }
        input[type="email"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #5cb85c;
            outline: none;
        }
        button {
            background-color: gray;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 600;       
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: green;
        }
        .redirect {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .redirect a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .redirect a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 class="site-title">Urban Shave</h2>
    
    <div class="form-container">
        <h2>Admin Log In</h2>
        <form id="loginForm" method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="redirect">
            <a href="forgotpass.php">Forgot Password?</a>
            <br><br>
            <label>Don't have an account? <a href="AdminRegistration.php">Register</a></label>
        </div>
    </div>
</body>
</html>
