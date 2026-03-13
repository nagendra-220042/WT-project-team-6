<?php
include "db.php";

$total_patients = $conn->query("SELECT COUNT(*) as total FROM Patients")->fetch_assoc()['total'];
$total_appointments = $conn->query("SELECT COUNT(*) as total FROM Appointments")->fetch_assoc()['total'];
$total_doctors = $conn->query("SELECT COUNT(*) as total FROM Doctors")->fetch_assoc()['total'];

echo "Patients: $total_patients<br>";
echo "Appointments: $total_appointments<br>";
echo "Doctors: $total_doctors<br>";
?>