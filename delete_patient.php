<?php

include "db.php";

$patientid = $_POST['patient_id'];

$sql = "DELETE FROM patients WHERE patient_id='$patientid'";

if($conn->query($sql)){
echo "Patient deleted successfully";
}else{
echo "Error: ".$conn->error;
}

?>