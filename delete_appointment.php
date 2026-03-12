<?php
include "db.php";

$appointment_id = $_GET['id'];

$sql = "DELETE FROM Appointments WHERE appointment_id='$appointment_id'";

if($conn->query($sql) === TRUE){
    header("Location:admin_login.php");
    exit();
}
else{
    echo "Error deleting appointment";
}
?>