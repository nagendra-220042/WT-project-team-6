<?php
include "db.php";

$patient_name = $_POST['patient_name'];
$phone = $_POST['phone'];
$doctor_id = $_POST['doctor_id'];
$doctor_name = $_POST['doctor_name'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$disease = $_POST['disease'];

$sql = "INSERT INTO Appointments(patient_name, phone, doctor_id, doctor_name, appointment_date, appointment_time, disease)
VALUES('$patient_name','$phone','$doctor_id','$doctor_name','$appointment_date','$appointment_time','$disease')";

if($conn->query($sql)){
    echo "Appointment booked successfully";
}else{
    echo "Error: " . $conn->error;
}
?>