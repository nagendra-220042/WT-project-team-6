<?php
if(isset($_POST['sub'])){
include "db.php";  // change to your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
}
else{
  header("location:signup.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard - Sanjeevani Hospital</title>
 <link rel="icon" type="image/png" href="resources\logo1.png">
  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <nav class="navbar">
    <div class="container navbar-content">
      <a href="index.html" class="brand">
        <i class="fas fa-heartbeat"></i>
        Sanjeevani Hospital
      </a>

      <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
      </button>
      
      <ul class="nav-menu">
        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="find-doctor.php"><i class="fas fa-user-md"></i> Find a Doctor</a></li>
        <li><a href="book-appointment.html"><i class="fas fa-calendar-check"></i> Book Appointment</a></li>
      </ul>
    </div>
  </nav>

  <div id="patientDashboard" class="dashboard">
    <div class="container">
      <div class="dashboard-header">
        <h1 class="dashboard-title">Welcome, <span id="patientName">
            <?php
                   if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $sql = "INSERT INTO Patients (name, age, gender, phone, email)
                    VALUES ('$name', '$age', '$gender', '$phone', '$email')";

                    $conn->query($sql);

                    

                    }
                    echo $name;

            ?>
        </span></h1>
        <p>Manage your appointments and view your medical records</p>
      </div>



       

      <div class="stats-grid">
        <div class="stat-card">
          <i class="fas fa-user-md" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value">6+</div>
          <div class="stat-label">Available Doctors</div>
        </div>

        <div class="stat-card">
          <i class="fas fa-heartbeat" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value">24/7</div>
          <div class="stat-label">Emergency Care</div>
        </div>
      </div>
      </div>


          
         
          

        <div class="card">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-notes-medical"></i> Medical Information
          </h2>
          <div class="grid grid-2">
            <div style="padding: 1rem; background: var(--bg-light); border-radius: 8px;">
              <p style="color: var(--text-light); margin-bottom: 0.5rem;">Blood Group</p>
              <p style="font-size: 1.2rem; font-weight: 600; color: var(--primary-color);">--</p>
            </div>
            <div style="padding: 1rem; background: var(--bg-light); border-radius: 8px;">
              <p style="color: var(--text-light); margin-bottom: 0.5rem;">Age</p>
              <p style="font-size: 1.2rem; font-weight: 600; color: var(--primary-color);">
              <?php
                  $sql="select age from patients where name='$name'";
                  $result=$conn->query($sql);
                  if($row=$result->fetch_assoc()){
                    echo $row['age'];
                  }
                  else{
                    echo "error";   
                  }
                 $conn->close();
              ?>
              Years</p>
            </div>
            <div style="padding: 1rem; background: var(--bg-light); border-radius: 8px;">
              <p style="color: var(--text-light); margin-bottom: 0.5rem;">Height</p>
              <p style="font-size: 1.2rem; font-weight: 600; color: var(--primary-color);">--</p>
            </div>
            <div style="padding: 1rem; background: var(--bg-light); border-radius: 8px;">
              <p style="color: var(--text-light); margin-bottom: 0.5rem;">Weight</p>
              <p style="font-size: 1.2rem; font-weight: 600; color: var(--primary-color);">--</p>
            </div>
          </div>
        </div>

        
  <footer class="footer">
    <div class="container">
      <p>&copy; 2026 Sanjeevani Hospital. All rights reserved.</p>
      <p style="margin-top: 0.5rem;">
        <i class="fas fa-phone"></i> +91 1800-123-4567 |
        <i class="fas fa-envelope"></i> contact@sanjeevanihospital.com
      </p>
    </div>
  </footer>

  <!-- <script src="script.js"></script> -->
</body>
</html>
