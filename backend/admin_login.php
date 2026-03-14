<?php
include "db.php";

$admin_id = $_POST['admin_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM Admin WHERE admin_id='$admin_id' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    header("Location: ../frontend/admin-dashboard.html");
    exit();
}else{
    echo "Invalid admin credentials";
}
?>