<?php
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Delete doctor by primary key
    $sql = "DELETE FROM Doctors WHERE did = $id";

    if($conn->query($sql)){
        header("Location:admin_login.php");
        exit();
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }
}
?>