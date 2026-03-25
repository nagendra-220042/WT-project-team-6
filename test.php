<?php
$conn = new mysqli("localhost", "root", "", "hospital_db", 3307);

if ($conn->connect_error) {
    die("ERROR: " . $conn->connect_error);
}

echo "SUCCESS";
?>