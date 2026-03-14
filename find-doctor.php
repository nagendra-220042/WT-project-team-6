<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find a Doctor - Sanjeevani Hospital</title>
  <link rel="icon" type="image/png" href="resources\logo1.png">

  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 

</style>
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
        <li><a href="find-doctor.php"><i class="fas fa-user-md"></i> Find a Doctor</a></li>
        <li><a href="book-appointment.html"><i class="fas fa-calendar-check"></i> Book Appointment</a></li>
        <li><a href="login.html"><i class="fas fa-sign-in-alt"></i> Login </a></li>
      </ul>
    </div>
  </nav>

  <section class="section">
    <div class="container">
       <h2 class="section-title">Our Expert Doctors</h2>
        <p class="section-subtitle">Meet our team of highly qualified medical professionals</p>


      <div id="doctorsGrid" class="grid grid-3">
        <?php
       include "db.php";
        $query = "SELECT * FROM doctors";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card">
        <div class="doctor-card">

        <h3 class="card-title"><?php echo $row['name']; ?></h3>

        <p class="doctor-specialty">Speciality: <?php echo $row['speciality']; ?></p>

        <p class="doctor-experience">Experience: <?php echo $row['experience']; ?> years</p>

        

      

        <a href="book-appointment.html"><button class="btn btn-primary" type="submit">Book a Appointment</button></a>

        </form>

        </div>
      </div>

        <?php
        }
        ?>
    </div>
  </section>

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
