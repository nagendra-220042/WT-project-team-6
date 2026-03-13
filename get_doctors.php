<?php

include "db.php";

$sql = "SELECT * FROM Doctors";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<tr>
<td>".$row['did']."</td>
<td>".$row['name']."</td>
<td>".$row['speciality']."</td>
<td>".$row['experience']."</td>
<td>
<button onclick='deleteDoctor(".$row['did'].")'>Delete</button>
</td>
</tr>";

}

?>