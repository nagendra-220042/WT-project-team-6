<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hospital_db";

$conn = new mysqli($host, $user, $password, $database, 3307);

if ($conn->connect_error) {
    die("ERROR: " . $conn->connect_error);
}


?>