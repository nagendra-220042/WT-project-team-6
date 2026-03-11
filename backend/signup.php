<?php
include "db.php";

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO Patients(name, age, gender, phone, email)
VALUES('$name','$age','$gender','$phone','$email')";

if($conn->query($sql)){
    echo "Signup successful. <a href='../frontend/login.html'>Login here</a>";
}else{
    echo "Error: " . $conn->error;
}
?>