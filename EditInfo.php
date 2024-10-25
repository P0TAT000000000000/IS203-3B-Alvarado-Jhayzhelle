<?php
require('./database.php');

// Initialize variables for editing data
$editID = '';
$editF = '';
$editM = '';
$editL = '';
$editE = '';
$editP = '';

// Fetch user data for editing if the form is submitted
if (isset($_POST['edit'])) {
    $editID = $_POST['editID'];
    $editF = $_POST['editF'];
    $editM = $_POST['editM'];
    $editL = $_POST['editL'];
    $editE = $_POST['editE'];
    $editP = $_POST['editP'];
}

// Update user information securely with hashed password
if (isset($_POST['update'])) {
    $updateID = $_POST['updateID'];
    $updateF = $_POST['updateF'];
    $updateM = $_POST['updateM'];
    $updateL = $_POST['updateL'];
    $updateE = $_POST['updateE'];
    $updateP = $_POST['updateP'];

    // Hash the password before saving it to the database
    $hashedPassword = password_hash($updateP, PASSWORD_DEFAULT);

    // Use prepared statements to avoid SQL injection
    $stmt = $connection->prepare("UPDATE jhayztable SET FirstName = ?, MiddleName = ?, LastName = ?, Email = ?, Password = ? WHERE ID = ?");
    $stmt->bind_param("sssssi", $updateF, $updateM, $updateL, $updateE, $hashedPassword, $updateID);

    if ($stmt->execute()) {
        echo '<script>alert("Successfully edited")</script>';
        echo '<script>window.location.href = "/Jhayz/Home.php"</script>';
    } else {
        echo '<script>alert("Error updating record: ' . htmlspecialchars($stmt->error) . '")</script>';
    }

    $stmt->close();
    $connection->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('images/Bg7.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
        }
        .card {
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        .card h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        h1 {
            color: #333;
            margin-top: 20px;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>

    <center><h1 style="font-family: Lucida Handwriting; color:white">Urban Shave</h1></center>
    <br>

    <div class="container">
        <div class="card">
            <form action="EditInfo.php" method="post">
                <h3><b>Edit your Information<b></h3>
                <input type="hidden" name="updateID" value="<?php echo htmlspecialchars($editID); ?>" /> <!-- Hidden field for user ID -->
                <input type="text" class="form-control" name="updateF" placeholder="Enter your First Name" value="<?php echo htmlspecialchars($editF); ?>" required/>
                <input type="text" class="form-control" name="updateM" placeholder="Enter your Middle Name" value="<?php echo htmlspecialchars($editM); ?>" required/>
                <input type="text" class="form-control" name="updateL" placeholder="Enter your Last Name" value="<?php echo htmlspecialchars($editL); ?>" required/>
                <input type="email" class="form-control" name="updateE" placeholder="Enter your Email" value="<?php echo htmlspecialchars($editE); ?>" required/>
                <input type="password" class="form-control" name="updateP" placeholder="Enter your Password" value="<?php echo htmlspecialchars($editP); ?>" required/>
                <input type="submit" name="update" value="UPDATE" class="btn btn-primary"/>
            </form>
        </div>
    </div>

</body>
</html>
