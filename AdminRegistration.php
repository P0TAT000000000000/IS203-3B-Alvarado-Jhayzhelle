<?php
require('./database2.php'); // Ensure this file correctly connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Retrieve and sanitize form data
    $FName = $_POST['FirstName'];
    $LName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare the SQL statement
    $queryCreate = "INSERT INTO admin.admintable (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($connection, $queryCreate)) {
        mysqli_stmt_bind_param($stmt, "ssss", $FName, $LName, $Email, $Password);
        if (!mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Registration failed: ' . mysqli_stmt_error($stmt) . '");</script>';
        } else {
            echo '<script>alert("Successfully Created"); window.location.href = "AdminLogin.php";</script>';
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
    <title>Admin Registration Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('images/Bg8.jpg');
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
            /* background: gray; */
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 350px;
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
        input[type="text"], input[type="FirstName"], input[type="LastName"], input[type="Email"], input[type="Password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: gray;
            /* background-color: #5cb85c; */
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
            /* background-color: #4cae4c; */
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

        .site-title {
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: "Lucida Handwriting";
            color: white;
            font-size: 50px;
            font-weight: 600;
        }
    </style>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="Email"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .redirect {
            text-align: center;
            margin-top: 10px;
        }
        .redirect a {
            color: #007bff;
            text-decoration: none;
        }
        .redirect a:hover {
            text-decoration: underline;
        }
    </style>
     -->
</head>
<body>
    <h2 class="site-title">Urban Shave</h2>

    <div class="form-container">
        <h2>Admin Registration</h2>
        <form id="registrationForm" method="POST" action="">
            <input type="text" name="FirstName" placeholder="First Name" required>
            <input type="text" name="LastName" placeholder="Last Name" required>
            <input type="Email" name="Email" placeholder="Email" required>
            <input type="password" name="Password" placeholder="Password" required>
            <button type="submit" name="create">Register</button>
        </form>
        <div class="redirect">
            <label>Already have an account? <a href="AdminLogin.php">Login</a></label>
        </div>
    </div>
</body>
</html>
