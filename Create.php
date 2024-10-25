<?php

require('./database.php');

if(isset($_POST['create'])){
    $Fname = mysqli_real_escape_string($connection, $_POST['Fname']);
    $Mname = mysqli_real_escape_string($connection, $_POST['Mname']);
    $Lname = mysqli_real_escape_string($connection, $_POST['Lname']);
    $Email = mysqli_real_escape_string($connection, $_POST['Email']);
    $Password = $_POST['Password'];

    // Hash the password
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Corrected the spelling of 'queryCreate'
    $queryCreate = "INSERT INTO jhayztable (FirstName, MiddleName, LastName, Email, Password) VALUES('$Fname', '$Mname', '$Lname', '$Email', '$hashedPassword')";

    $sqlCreate = mysqli_query($connection, $queryCreate);

    if($sqlCreate) {
        echo '<script>alert("Successfully Created")</script>';
        echo '<script>window.location.href = "/Jhayz/Index.php"</script>';
    } else {
        // Add error handling to help diagnose problems
        echo '<script>alert("Error creating account: ' . mysqli_error($connection) . '")</script>';
    }
}

?>
