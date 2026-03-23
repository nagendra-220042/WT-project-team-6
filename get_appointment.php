<?php

include "db.php";

$name = $_GET['name'];
$phone=$_GET['phone'];

$sql = "SELECT * FROM appointments WHERE patient_name='$name' and phone='$phone' ";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<tr>

<td>".$row['patient_name']."</td>
<td>".$row['phone']."</td>
<td>".$row['doctor_name']."</td>
<td>".$row['appointment_date']."</td>
<td>".$row['appointment_time']."</td>
<td>".$row['disease']."</td>
<td>
<button onclick='deleteAppointment(".$row['appointment_id'].")'>Delete</button>
</td>

</tr>";

}

?>