<?php

include "db.php";

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<tr>
<td>".$row['patient_id']."</td>
<td>".$row['name']."</td>
<td>".$row['age']."</td>
<td>".$row['gender']."</td>
<td>".$row['phone']."</td>
<td>".$row['email']."</td>
<td>
<button onclick='deletePatient(".$row['patient_id'].")'>Delete</button>
</td>
</tr>";

}

?>