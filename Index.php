<?php
require('./Read.php'); // Ensure Read.php includes necessary database connection and query

// Assume $sqlAccounts is already defined and fetched in Read.php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url('images/Bg7.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .container {
            margin-top: 50px;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for contrast */
            padding: 30px;
            border-radius: 10px;
        }
        table {
            width: 100%; /* Ensure it takes full width of container */
            max-width: 900px; /* Set a maximum width */
            margin: 20px auto; /* Center the table */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Prevent overflow */
        }
        th, td {
            text-align: center; /* Center align text */
        }
        .btn {
            margin: 5px; /* Add some space between buttons */
        }
        @media print {
            #printButton {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4"><b>Urban Shave Admin Management System</b></h1>

        <form action="Create.php" method="post" class="mb-4">
            <h3 class="text-center" style="font-family:Lucida Handwriting;"><b>Create New Account</b></h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="Fname" class="form-control" placeholder="Firstname" required />
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="Mname" class="form-control" placeholder="Middlename" required />
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="Lname" class="form-control" placeholder="Lastname" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="email" name="Email" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group col-md-6">
                    <input type="password" name="Password" class="form-control" placeholder="Password" required />
                </div>
            </div>
            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
            <button id="printButton" type="button" class="btn btn-primary" onclick="window.print()">PRINT</button>
            <!-- Logout button -->
            <form action="#" method="post" style="display:inline;">
                <button type="submit" class="btn btn-danger"><a href="AdminLogin.php">LOGOUT</a></button>
            </form>
        </form>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
                    <tr class="warning">
                        <td><?php echo htmlspecialchars($results['ID']); ?></td>
                        <td><?php echo htmlspecialchars($results['FirstName']); ?></td>
                        <td><?php echo htmlspecialchars($results['MiddleName']); ?></td>
                        <td><?php echo htmlspecialchars($results['LastName']); ?></td>
                        <td><?php echo htmlspecialchars($results['Email']); ?></td>
                        <td><?php echo htmlspecialchars($results['Password']); ?></td>
                        <td>
                            <form action="edit.php" method="post" style="display:inline;">
                                <input type="submit" name="edit" value="EDIT" class="btn btn-info btn-xs">
                                <input type="hidden" name="editID" value="<?php echo htmlspecialchars($results['ID']); ?>">
                                <input type="hidden" name="editF" value="<?php echo htmlspecialchars($results['FirstName']); ?>">
                                <input type="hidden" name="editM" value="<?php echo htmlspecialchars($results['MiddleName']); ?>">
                                <input type="hidden" name="editL" value="<?php echo htmlspecialchars($results['LastName']); ?>">
                                <input type="hidden" name="editE" value="<?php echo htmlspecialchars($results['Email']); ?>">
                                <input type="hidden" name="editP" value="<?php echo htmlspecialchars($results['Password']); ?>">
                            </form>
                            <form action="Delete.php" method="post" style="display:inline;">
                                <input type="submit" name="delete" value="DELETE" class="btn btn-danger btn-xs">
                                <input type="hidden" name="deleteID" value="<?php echo htmlspecialchars($results['ID']); ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
