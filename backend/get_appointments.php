<?php
include "db.php";

$sql = "SELECT * FROM Appointments ORDER BY appointment_date ASC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['patient_name'] . " | " . $row['doctor_name'] . " | " . $row['appointment_date'] . " " . $row['appointment_time'] . " | " . $row['disease'] . "<br>";
}
?>