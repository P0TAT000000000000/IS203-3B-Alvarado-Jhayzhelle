<?php
require('./database.php');

if (isset($_POST['delete'])){
    $deleteId = $_POST['deleteID'];

    $querrydelete = "DELETE FROM jhayztable WHERE ID = $deleteId";
    $sqldelete = mysqli_query($connection,$querrydelete);

    echo '<script>alert("Succesfully Deleted")</script>';
    echo '<script>window.location.href = "/Jhayz/Index.php"</script>';
}

?>