<?php
include "db.php";

// Get data safely
$name = $_POST['name'] ?? '';
$speciality = $_POST['speciality'] ?? '';
$experience = $_POST['experience'] ?? '';

// Validate input
if(empty($name) || empty($speciality) || empty($experience)){
    echo "⚠ All fields are required!";
    exit;
}

// ✅ Check if doctor already exists
$check_sql = "SELECT * FROM Doctors 
              WHERE name='$name' AND speciality='$speciality'";

$result = $conn->query($check_sql);

// ✅ Handle query error
if(!$result){
    echo "Error: " . $conn->error;
    exit;
}

if($result->num_rows > 0){
    echo "⚠ Doctor already exists!";
} else {

    // ✅ Insert new doctor
    $insert_sql = "INSERT INTO Doctors (name, speciality, experience)
                   VALUES ('$name', '$speciality', '$experience')";

    if($conn->query($insert_sql)){
        echo "✅ Doctor added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>