<?php

include "db.php";

$name = $_POST['name'];
$password = $_POST['password'];


$sql = "INSERT INTO admin(admin_id, password)
VALUES('$name','$password')";

if($conn->query($sql)){
echo "Admin added successfully";
}else{
echo "Error: ".$conn->error;
}

?>