<?php
session_start(); // start session

$servername = "localhost";
$username = "root"; // DB username
$password = "";     // DB password
$dbname = "hospital_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Check if patient exists
    $sql = "SELECT * FROM Patients WHERE name=? AND phone=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        // // Patient exists → store session
        // $_SESSION['patient_name'] = $name;

        // // Redirect to dashboard
        // header("Location: patient-dashboard.php");
        // exit();
        echo "patient existed";
    } else {
        $error = "Patient not found. Please check your credentials.";
    }

    $stmt->close();
}
$conn->close();
?>