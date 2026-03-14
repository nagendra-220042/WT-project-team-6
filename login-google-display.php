<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "hospital_db";   // change to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard - Sanjeevani Hospital</title>

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
        <h1 class="dashboard-title"> <span id="patientName">
            <?php
                    $sql = "SELECT name FROM Patients WHERE name='$name' AND email='$email'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "Welcome " . $row['name'];
                    } else {
                        echo "Patient not found";
                    }

                    
            ?>
        </span></h1>
        <p>Manage your appointments and view your medical records</p>
      </div>

      <div class="stats-grid">
        <div class="stat-card">
          <i class="fas fa-calendar-check" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="totalAppointments">
            <?php
              // Query to count appointments
              $count_sql = "SELECT COUNT(*) AS total FROM Appointments WHERE patient_name='$name'";
              $count_result = $conn->query($count_sql);
              $count_row = $count_result->fetch_assoc();
              echo $count_row['total'];
            ?>
          </div>
          <div class="stat-label">Total Appointments</div>
        </div>

        <div class="stat-card">
          <i class="fas fa-clock" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="upcomingAppointments">
            <?php
                  $today = date("Y-m-d");

              $sql_upcoming = "SELECT COUNT(*) AS upcoming_total FROM Appointments WHERE patient_name='$name' and appointment_date != '$today'";
              $result_upcoming = $conn->query($sql_upcoming);
              $row_upcoming = $result_upcoming->fetch_assoc();

              $upcomnigAppointments = $row_upcoming['upcoming_total'];
              echo $upcomnigAppointments;
            ?>
            </div>
          <div class="stat-label">Upcoming Appointments</div>
        </div>

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

      <div style="display: grid; gap: 2rem; margin-top: 2rem;">
        <div class="card">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-calendar-alt"></i> My Appointments
          </h2>
          <div class="table-container" style="padding: 0; box-shadow: none;">
            <?php
            // Query to get appointment details
                  $sql = "SELECT patient_name, phone, doctor_name, appointment_date, appointment_time, disease
                          FROM Appointments
                          WHERE patient_name='$name'";

                  $result = $conn->query($sql);


                  echo "<table border='1' cellpadding='10' class='table'>";

                  echo "<tr>
                          <th>Patient Name</th>
                          <th>Phone</th>
                          <th>Doctor Name</th>
                          <th>Appointment Date</th>
                          <th>Appointment Time</th>
                          <th>Disease</th>
                        </tr>";

                  while($row = $result->fetch_assoc()){

                      echo "<tr>
                              <td>".$row['patient_name']."</td>
                              <td>".$row['phone']."</td>
                              <td>".$row['doctor_name']."</td>
                              <td>".$row['appointment_date']."</td>
                              <td>".$row['appointment_time']."</td>
                              <td>".$row['disease']."</td>
                            </tr>";
                  }

                  echo "</table>";

                 
            ?>
          </div>
          <div style="margin-top: 1.5rem;">
            <a href="book-appointment.html" class="btn btn-primary">
              <i class="fas fa-plus"></i> Book New Appointment
            </a>
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
                         $sql = "SELECT age FROM Patients WHERE name='$name'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['age'];
                        } else {
                            echo "--";
                        }
                         $conn->close();
                  ?>
              </p>
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

        <div class="card">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-history"></i> Recent Visits
          </h2>
          <div style="display: flex; flex-direction: column; gap: 1rem;">
            <?php
                      $sql = "SELECT patient_name, phone, doctor_name, appointment_date, appointment_time, disease
                                FROM Appointments
                                WHERE patient_name='$name'";

                        $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()){

                       echo "
                       <div style='padding: 1rem; border-left: 4px solid var(--secondary-color); background: var(--bg-light); border-radius: 4px;'>
                      <p style='color: var(--text-light); font-size: 0.9rem;'>".$row['doctor_name']."</p>
                      <p style='color: var(--text-light); font-size: 0.9rem;'>".$row['appointment_date']."</p>
                      <p style='color: var(--text-light); font-size: 0.9rem;'>".$row['appointment_time']."</p></div>";
                      

                     }
                      $conn->close();
                  ?>
          </div>
        </div>
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
