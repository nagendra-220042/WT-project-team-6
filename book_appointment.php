<?php
include "config.php";

// Only process POST requests
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Collect form data safely
    $patient_name = $_POST['patient_name'] ?? '';
    $phone        = $_POST['phone'] ?? '';
    $doctor_id    = $_POST['doctor_id'] ?? '';
    $date         = $_POST['appointment_date'] ?? '';
    $time         = $_POST['appointment_time'] ?? '';
    $disease      = $_POST['disease'] ?? '';

    // Check for empty fields (optional but good)
    if(empty($patient_name) || empty($phone) || empty($doctor_id) || empty($date) || empty($time) || empty($disease)){
        echo "⚠ All fields are required!";
        exit;
    }

    // Check if the selected doctor already has an appointment at the same date and time
    $check_sql = "SELECT * FROM appointments 
                  WHERE doctor_id='$doctor_id' 
                  AND appointment_date='$date' 
                  AND appointment_time='$time'";
    $result = $conn->query($check_sql);

    if($result->num_rows > 0){
        echo "⚠ Please prefer other slot. This time is already booked for this doctor.";
    } else {
            $did = $doctor_id; // doctor id

        $sql = "SELECT name FROM Doctors WHERE did = $did";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $doctor_name=$row["name"];
        }
        // Insert appointment into database
        $insert_sql = "INSERT INTO appointments 
        (patient_name, phone, doctor_id, doctor_name ,appointment_date, appointment_time, disease)
        VALUES
        ('$patient_name','$phone','$doctor_id','$doctor_name','$date','$time','$disease')";

        if($conn->query($insert_sql)){
            echo "✅ Appointment booked successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }

}
?>