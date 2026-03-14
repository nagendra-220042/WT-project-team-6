<?php
include "db.php";

// Get the patient_id from URL
$patient_id = $_GET['id'];

// Delete the patient from the Patients table
$sql = "DELETE FROM Patients WHERE patient_id = $patient_id";

if($conn->query($sql)){
    header("Location: ../frontend/admin-dashboard.html"); // redirect back to dashboard
    exit();
} else {
    echo "Error deleting patient: " . $conn->error;
}
?>