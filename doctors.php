<?php
$conn = mysqli_connect("localhost","root","","doctors_block");

$query = "SELECT * FROM doctors";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Select Doctor</title>

<style>

.container{
display:flex;
flex-wrap:wrap;
}

.card{
border:1px solid #ccc;
padding:15px;
margin:10px;
width:220px;
border-radius:8px;
text-align:center;
box-shadow:0 0 5px gray;
}

button{
background:#2e86de;
color:white;
padding:8px 12px;
border:none;
border-radius:5px;
cursor:pointer;
}

</style>
</head>

<body>

<h2>Select a Doctor</h2>

<div class="container">

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<div class="card">

<h3><?php echo $row['Doctor_name']; ?></h3>

<p>Speciality: <?php echo $row['Speciality']; ?></p>

<p>Experience: <?php echo $row['Experience']; ?> years</p>

<form action="select_doctor.php" method="POST">

<input type="hidden" name="doctor" value="<?php echo $row['Doctor_name']; ?>">

<button type="submit">Select Doctor</button>

</form>

</div>

<?php
}
?>

</div>

</body>
</html>