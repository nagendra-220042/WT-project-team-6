<?php
include "db.php";

$did = $_POST['did'];

$sql = "DELETE FROM Doctors WHERE did='$did'";

if($conn->query($sql)){
    echo "Deleted Successfully";

}else{
echo "Error : ".$conn->error;
}
?>
