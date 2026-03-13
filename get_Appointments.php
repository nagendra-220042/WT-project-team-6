<?php

include "db.php";

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<tr>
<td>".$row['appointment_id']."</td>
<td>".$row['patient_name']."</td>
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