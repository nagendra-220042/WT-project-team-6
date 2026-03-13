<?php

include "db.php";

$ap_id = $_POST['appointment_id'];

$sql = "DELETE FROM appointments WHERE appointment_id='$ap_id'";

if($conn->query($sql)){
echo "Appointment deleted successfully";
}else{
echo "Error: ".$conn->error;
}

?>