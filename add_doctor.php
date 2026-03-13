<?php

include "db.php";

$name = $_POST['name'];
$speciality = $_POST['speciality'];
$experience = $_POST['experience'];

$sql = "INSERT INTO Doctors(name, speciality, experience)
VALUES('$name','$speciality','$experience')";

if($conn->query($sql)){
echo "Doctor added successfully";
}else{
echo "Error: ".$conn->error;
}

?>