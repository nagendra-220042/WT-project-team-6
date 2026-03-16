<?php

include "db.php";

$sql = "SELECT speciality, COUNT(*) as total FROM doctors GROUP BY speciality";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo '
<div style="display:flex; justify-content:space-between; padding:0.8rem; background:var(--bg-light); border-radius:6px;">
<span>'.$row["speciality"].'</span>
<span class="badge badge-success">'.$row["total"].' Doctors</span>
</div>';

}

?>