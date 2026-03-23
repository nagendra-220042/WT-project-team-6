<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $patient_name = $_POST['patient_name'] ?? '';
    $phone        = $_POST['phone'] ?? '';
    $doctor_id    = $_POST['doctor_id'] ?? '';
    $date         = $_POST['appointment_date'] ?? '';
    $time         = $_POST['appointment_time'] ?? '';
    $disease      = $_POST['disease'] ?? '';

    if(empty($patient_name) || empty($phone) || empty($doctor_id) || empty($date) || empty($time) || empty($disease)){
        echo "⚠ All fields are required!";
        exit;
    }

    // 1. Prevent same patient booking ANY doctor at same time
    $patient_check_sql = "SELECT * FROM appointments 
                          WHERE phone='$phone' 
                          AND appointment_date='$date' 
                          AND appointment_time='$time'";

    $patient_result = $conn->query($patient_check_sql);

    if($patient_result->num_rows > 0){
        echo "⚠ You already have another appointment at this time!";
        exit;
    }

    // 2. Prevent same doctor slot double booking
    $doctor_check_sql = "SELECT * FROM appointments 
                         WHERE doctor_id='$doctor_id' 
                         AND appointment_date='$date' 
                         AND appointment_time='$time'";

    $doctor_result = $conn->query($doctor_check_sql);

    if($doctor_result->num_rows > 0){
        echo "⚠ This doctor is already booked for this time!";
        exit;
    }

    // 3. Get doctor name
    $sql = "SELECT name FROM Doctors WHERE did = $doctor_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $doctor_name = $row["name"];
    }

    // 4. Insert
    $insert_sql = "INSERT INTO appointments 
    (patient_name, phone, doctor_id, doctor_name, appointment_date, appointment_time, disease)
    VALUES
    ('$patient_name','$phone','$doctor_id','$doctor_name','$date','$time','$disease')";

    if($conn->query($insert_sql)){
        echo "✅ Appointment booked successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>