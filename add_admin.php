<?php
include "db.php";

// Get data safely
$admin_id = $_POST['admin_id'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
if(empty($admin_id) || empty($password)){
    echo "⚠ All fields are required!";
    exit;
}

// ✅ Check duplicate admin
$check_sql = "SELECT * FROM Admin WHERE admin_id='$admin_id'";
$result = $conn->query($check_sql);

// ✅ Handle query error
if(!$result){
    echo "Error: " . $conn->error;
    exit;
}

if($result->num_rows > 0){
    echo "⚠ Admin already exists!";
} else {

    // ✅ Insert admin
    $sql = "INSERT INTO Admin (admin_id, password)
            VALUES ('$admin_id', '$password')";

    if($conn->query($sql)){
        echo "✅ Admin added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>