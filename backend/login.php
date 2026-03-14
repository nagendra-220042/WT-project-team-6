<?php
include "db.php";

$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM Patients WHERE name='$name' AND phone='$phone'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    header("Location: ../frontend/patient-dashboard.html");
    exit();
}else{
    echo "Invalid login";
}
?>