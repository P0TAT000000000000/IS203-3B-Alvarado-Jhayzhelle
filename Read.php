<?php

require('./database.php');

$querryAccounts = "SELECT * FROM jhayztable";
$sqlAccounts = mysqli_query($connection,$querryAccounts);

?>