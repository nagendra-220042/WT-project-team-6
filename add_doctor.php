<?php
include "db.php";

$name = $_POST['name'];
$speciality = $_POST['speciality'];
$experience = $_POST['experience'];

$sql = "INSERT INTO Doctors (name, speciality, experience) VALUES ('$name','$speciality',$experience)";

if($conn->query($sql)){
    header("Location:admin_login.php");
    exit();
}else{
    echo "Error adding doctor: " . $conn->error;
}
?>