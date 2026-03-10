<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "hospital_db";   // change to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO Patients (name, age, gender, phone, email)
        VALUES ('$name', '$age', '$gender', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    // echo "Patient added successfully";
    header("Location: patient-dashboard.html");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>