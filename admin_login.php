<?php
include "db.php";

$admin_id = $_POST['admin_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE admin_id='$admin_id' AND password='$password'";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Sanjeevani Hospital</title>
  <link rel="icon" type="image/png" href="resources\logo1.png">

  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <nav class="navbar">
    <div class="container navbar-content">
      <a href="index.html" class="brand">
        <i class="fas fa-heartbeat"></i>
        <span><img src="resources\logo.png" width="250px" style="border-radius: 50px;"></span>
      </a>

      <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
      </button>

      <ul class="nav-menu">
        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="find-doctor.html"><i class="fas fa-user-md"></i> Doctors</a></li>
        <li><a href="admin-dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      </ul>
    </div>
  </nav>

  <div id="adminDashboard" class="dashboard">
    <div class="container">
      <div class="dashboard-header">
        <h1 class="dashboard-title">
          <i class="fas fa-user-shield"></i> 
          <?php
                if($result->num_rows > 0){
                    echo "Welcome ".$admin_id;
                
            }else{
                // header("Location:admin-login.html");
                echo "you are not a admin";
            }
          ?>
        </h1>
        <p>Manage hospital operations and monitor activities</p>
      </div>

      <div class="stats-grid">
        <div class="stat-card">
          <i class="fas fa-users" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="totalPatients">
              <?php
                $total_patients = $conn->query("SELECT COUNT(*) as total FROM Patients")->fetch_assoc()['total'];
                echo $total_patients;
              ?>
          </div>
          <div class="stat-label">Total Patients</div>
        </div>

        <div class="stat-card">
          <i class="fas fa-user-md" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="totalDoctors">
              <?php
                $total_doctors = $conn->query("SELECT COUNT(*) as total FROM Doctors")->fetch_assoc()['total'];
                echo $total_doctors;
              ?>
          </div>
          <div class="stat-label">Total Doctors</div>
        </div>

        <div class="stat-card">
          <i class="fas fa-calendar-check" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="totalAppointments">
              <?php
                $total_appointments = $conn->query("SELECT COUNT(*) as total FROM Appointments")->fetch_assoc()['total'];
                echo $total_appointments;
              ?>
          </div>
          <div class="stat-label">Total Appointments</div>
        </div>

        <div class="stat-card">
          <i class="fas fa-calendar-day" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
          <div class="stat-value" id="todayAppointments">
            <?php
                  $today = date("Y-m-d");

              $sql_today = "SELECT COUNT(*) AS today_total FROM Appointments WHERE appointment_date = '$today'";
              $result_today = $conn->query($sql_today);
              $row_today = $result_today->fetch_assoc();

              $todayAppointments = $row_today['today_total'];
              echo $todayAppointments;
            ?>
          </div>
          <div class="stat-label">Today's Appointments</div>
        </div>
      </div>

      <div style="display: grid; gap: 2rem; margin-top: 2rem;">
        <div class="table-container">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-users"></i> Patient Records
          </h2>
        
                        
            <table border="1">

          <thead>
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Speciality</th>
          <th>Experience</th>
          <th>Action</th>
          </tr>
          </thead>

          <tbody id="patientTable"></tbody>

          </table>
      
        </div>

        <div class="table-container">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-calendar-alt"></i> Appointment List
          </h2>
           <table border="1">

          <thead>
          <tr>
            <th>Appointment ID</th>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Disease</th>
          </tr>
          </thead>

          <tbody id="appointmentTable"></tbody>

          </table>
        </div>
         <div class="table-container">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-calendar-alt"></i> Doctors
          </h2>
          
          <table border="1">

          <thead>
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Speciality</th>
          <th>Experience</th>
          <th>Action</th>
          </tr>
          </thead>

          <tbody id="doctorTable"></tbody>

          </table>
        
        <input type="text" id="name" placeholder="Doctor Name">

        <input type="text" id="speciality" placeholder="Speciality">

        <input type="number" id="experience" placeholder="Experience">

        <button onclick="addDoctor()">Add Doctor</button>
        </div>

        <div class="card">
          <h2 style="margin-bottom: 1.5rem; color: var(--text-dark);">
            <i class="fas fa-chart-line"></i> Hospital Statistics
          </h2>
          <div class="grid grid-3">
            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #667eea, #764ba2); color: white; border-radius: 8px;">
              <i class="fas fa-bed" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
              <p style="font-size: 2rem; font-weight: 700; margin-bottom: 0.3rem;">100</p>
              <p style="opacity: 0.9;">Total Beds</p>
            </div>
            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #f093fb, #f5576c); color: white; border-radius: 8px;">
              <i class="fas fa-procedures" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
              <p style="font-size: 2rem; font-weight: 700; margin-bottom: 0.3rem;">75</p>
              <p style="opacity: 0.9;">Occupied Beds</p>
            </div>
            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #4facfe, #00f2fe); color: white; border-radius: 8px;">
              <i class="fas fa-ambulance" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
              <p style="font-size: 2rem; font-weight: 700; margin-bottom: 0.3rem;">5</p>
              <p style="opacity: 0.9;">Ambulances</p>
            </div>
          </div>
        </div>

        <div class="grid grid-2">
          <div class="card">
            <h3 style="margin-bottom: 1rem; color: var(--text-dark);">
              <i class="fas fa-user-injured"></i> Department Overview
            </h3>
            <div style="display: flex; flex-direction: column; gap: 0.8rem;">
              <div style="display: flex; justify-content: space-between; padding: 0.8rem; background: var(--bg-light); border-radius: 6px;">
                <span>Cardiology</span>
                <span class="badge badge-success">8 Doctors</span>
              </div>
              <div style="display: flex; justify-content: space-between; padding: 0.8rem; background: var(--bg-light); border-radius: 6px;">
                <span>Pediatrics</span>
                <span class="badge badge-success">6 Doctors</span>
              </div>
              <div style="display: flex; justify-content: space-between; padding: 0.8rem; background: var(--bg-light); border-radius: 6px;">
                <span>Orthopedics</span>
                <span class="badge badge-success">7 Doctors</span>
              </div>
              <div style="display: flex; justify-content: space-between; padding: 0.8rem; background: var(--bg-light); border-radius: 6px;">
                <span>Neurology</span>
                <span class="badge badge-success">5 Doctors</span>
              </div>
            </div>
          </div>

          <div class="card">
            <h3 style="margin-bottom: 1rem; color: var(--text-dark);">
              <i class="fas fa-clock"></i> Recent Activity
            </h3>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
              <div style="padding: 1rem; border-left: 4px solid var(--secondary-color); background: var(--bg-light); border-radius: 4px;">
                <p style="font-weight: 600; margin-bottom: 0.3rem;">New Patient Registered</p>
                <p style="color: var(--text-light); font-size: 0.9rem;">Ramesh Kumar - 2 hours ago</p>
              </div>
              <div style="padding: 1rem; border-left: 4px solid var(--primary-color); background: var(--bg-light); border-radius: 4px;">
                <p style="font-weight: 600; margin-bottom: 0.3rem;">Appointment Confirmed</p>
                <p style="color: var(--text-light); font-size: 0.9rem;">Sunita Devi - 3 hours ago</p>
              </div>
              <div style="padding: 1rem; border-left: 4px solid var(--accent-color); background: var(--bg-light); border-radius: 4px;">
                <p style="font-weight: 600; margin-bottom: 0.3rem;">Patient Discharged</p>
                <p style="color: var(--text-light); font-size: 0.9rem;">Anil Verma - 5 hours ago</p>
              </div>
            </div>
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
  <script>



    // <================patients functions==================>


function loadPatients(){

fetch("get_Patients.php")
.then(res=>res.text())
.then(data=>{
document.getElementById("patientTable").innerHTML=data;
});

}

function deletePatient(id){

fetch("delete_patient.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"patient_id="+id

})
.then(res=>res.text())
.then(data=>{
alert(data);
loadPatients();
});

}


    // <================appointments functions==================>

function loadAppointments(){

fetch("get_Appointments.php")
.then(res=>res.text())
.then(data=>{
document.getElementById("appointmentTable").innerHTML=data;
});

}

function deleteAppointment(id){

fetch("delete_appointment.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"appointment_id="+id

})
.then(res=>res.text())
.then(data=>{
alert(data);
loadAppointments();
});

}





    // <================doctors functions==================>



function loadDoctors(){

fetch("get_doctors.php")
.then(res=>res.text())
.then(data=>{
document.getElementById("doctorTable").innerHTML=data;
});

}

function deleteDoctor(id){

fetch("delete_doctor.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"did="+id

})
.then(res=>res.text())
.then(data=>{
alert(data);
loadDoctors();
});

}
function addDoctor(){

let name = document.getElementById("name").value;
let speciality = document.getElementById("speciality").value;
let experience = document.getElementById("experience").value;

fetch("add_doctor.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"name="+name+"&speciality="+speciality+"&experience="+experience

})
.then(res=>res.text())
.then(data=>{
alert(data);
loadDoctors();
});

}

loadDoctors();
loadPatients();
loadAppointments();

</script>
  <!-- <script src="script.js"></script> -->
</body>
</html>
