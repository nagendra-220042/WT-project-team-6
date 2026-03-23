// const doctorsData = [
//   {
//     id: 1,
//     name: "Dr. Rajesh Kumar",
//     specialty: "Cardiologist",
//     experience: "15 years",
//     image: "https://images.pexels.com/photos/5215024/pexels-photo-5215024.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Mon-Fri: 9:00 AM - 5:00 PM",
//     education: "MBBS, MD Cardiology"
//   },
//   {
//     id: 2,
//     name: "Dr. Priya Sharma",
//     specialty: "Pediatrician",
//     experience: "12 years",
//     image: "https://images.pexels.com/photos/5452293/pexels-photo-5452293.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Mon-Sat: 10:00 AM - 6:00 PM",
//     education: "MBBS, MD Pediatrics"
//   },
//   {
//     id: 3,
//     name: "Dr. Amit Patel",
//     specialty: "Orthopedic",
//     experience: "18 years",
//     image: "https://images.pexels.com/photos/5452201/pexels-photo-5452201.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Mon-Fri: 8:00 AM - 4:00 PM",
//     education: "MBBS, MS Orthopedics"
//   },
//   {
//     id: 4,
//     name: "Dr. Sneha Reddy",
//     specialty: "Dermatologist",
//     experience: "10 years",
//     image: "https://images.pexels.com/photos/5452274/pexels-photo-5452274.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Tue-Sat: 11:00 AM - 7:00 PM",
//     education: "MBBS, MD Dermatology"
//   },
//   {
//     id: 5,
//     name: "Dr. Vikram Singh",
//     specialty: "Neurologist",
//     experience: "20 years",
//     image: "https://images.pexels.com/photos/5215024/pexels-photo-5215024.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Mon-Fri: 9:00 AM - 5:00 PM",
//     education: "MBBS, DM Neurology"
//   },
//   {
//     id: 6,
//     name: "Dr. Anjali Mehta",
//     specialty: "Gynecologist",
//     experience: "14 years",
//     image: "https://images.pexels.com/photos/5452293/pexels-photo-5452293.jpeg?auto=compress&cs=tinysrgb&w=400",
//     schedule: "Mon-Sat: 10:00 AM - 6:00 PM",
//     education: "MBBS, MS Gynecology"
//   }
// ];

// const appointmentsData = [
//   {
//     id: 1,
//     patientName: "Ramesh Kumar",
//     doctorName: "Dr. Rajesh Kumar",
//     date: "2026-03-10",
//     time: "10:00 AM",
//     status: "Confirmed",
//     problem: "Chest pain"
//   },
//   {
//     id: 2,
//     patientName: "Sunita Devi",
//     doctorName: "Dr. Priya Sharma",
//     date: "2026-03-11",
//     time: "2:00 PM",
//     status: "Pending",
//     problem: "Child fever"
//   },
//   {
//     id: 3,
//     patientName: "Anil Verma",
//     doctorName: "Dr. Amit Patel",
//     date: "2026-03-09",
//     time: "11:00 AM",
//     status: "Completed",
//     problem: "Knee pain"
//   }
// ];

// const patientsData = [
//   {
//     id: 1,
//     name: "Ramesh Kumar",
//     age: 45,
//     gender: "Male",
//     phone: "9876543210",
//     email: "ramesh@email.com",
//     bloodGroup: "O+",
//     lastVisit: "2026-03-05"
//   },
//   {
//     id: 2,
//     name: "Sunita Devi",
//     age: 32,
//     gender: "Female",
//     phone: "9876543211",
//     email: "sunita@email.com",
//     bloodGroup: "A+",
//     lastVisit: "2026-03-06"
//   },
//   {
//     id: 3,
//     name: "Anil Verma",
//     age: 55,
//     gender: "Male",
//     phone: "9876543212",
//     email: "anil@email.com",
//     bloodGroup: "B+",
//     lastVisit: "2026-03-07"
//   }
// ];

function toggleMobileMenu() {
  const navMenu = document.querySelector('.nav-menu');
  navMenu.classList.toggle('active');
}

// function searchDoctors() {
//   const searchInput = document.getElementById('searchDoctor');
//   const specialtyFilter = document.getElementById('specialtyFilter');

//   if (!searchInput || !specialtyFilter) return;

//   const searchTerm = searchInput.value.toLowerCase();
//   const specialty = specialtyFilter.value.toLowerCase();

//   const filteredDoctors = doctorsData.filter(doctor => {
//     const matchesSearch = doctor.name.toLowerCase().includes(searchTerm) ||
//                          doctor.specialty.toLowerCase().includes(searchTerm);
//     const matchesSpecialty = specialty === 'all' || doctor.specialty.toLowerCase() === specialty;

//     return matchesSearch && matchesSpecialty;
//   });

//   displayDoctors(filteredDoctors);
// }

// function displayDoctors(doctors) {
//   const doctorsGrid = document.getElementById('doctorsGrid');
//   if (!doctorsGrid) return;

//   if (doctors.length === 0) {
//     doctorsGrid.innerHTML = '<p style="text-align: center; grid-column: 1/-1;">No doctors found matching your criteria.</p>';
//     return;
//   }

//   doctorsGrid.innerHTML = doctors.map(doctor => `
//     <div class="card doctor-card">
//       <img src="${doctor.image}" alt="${doctor.name}" class="doctor-img">
//       <h3 class="doctor-name">${doctor.name}</h3>
//       <p class="doctor-specialty">${doctor.specialty}</p>
//       <p class="doctor-experience">${doctor.experience} Experience</p>
//       <div class="doctor-schedule">
//         <i class="fas fa-clock"></i> ${doctor.schedule}
//       </div>
//       <button class="btn btn-primary" onclick="bookWithDoctor('${doctor.name}')">Book Appointment</button>
//     </div>
//   `).join('');
// }

// function bookWithDoctor(doctorName) {
//   localStorage.setItem('selectedDoctor', doctorName);
//   window.location.href = 'book-appointment.html';
// }

// function handleAppointmentForm(event) {
//   event.preventDefault();

//   const isLoggedIn = localStorage.getItem('isLoggedIn');
//   const userRole = localStorage.getItem('userRole');

//   if (!isLoggedIn || userRole !== 'patient') {
//     showAlert('Please login as a patient to book an appointment', 'error');
//     setTimeout(() => {
//       window.location.href = 'login.html';
//     }, 2000);
//     return;
//   }

//   const formData = {
//     patientName: document.getElementById('patientName').value,
//     age: document.getElementById('age').value,
//     gender: document.getElementById('gender').value,
//     phone: document.getElementById('phone').value,
//     email: document.getElementById('email').value,
//     problem: document.getElementById('problem').value,
//     doctor: document.getElementById('doctor').value,
//     date: document.getElementById('date').value,
//     time: document.getElementById('time').value
//   };

//   const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
//   appointments.push({
//     id: Date.now(),
//     ...formData,
//     status: 'Confirmed',
//     bookingDate: new Date().toISOString()
//   });
//   localStorage.setItem('appointments', JSON.stringify(appointments));

//   showAlert('Appointment booked successfully! Confirmation sent to your email.', 'success');

//   setTimeout(() => {
//     window.location.href = 'patient-dashboard.html';
//   }, 2000);
// }

// function handleLogin(event) {
//   event.preventDefault();

//   const role = document.querySelector('.role-option.active')?.dataset.role;
//   const email = document.getElementById('email').value;
//   const password = document.getElementById('password').value;

//   if (!role) {
//     showAlert('Please select a role (Patient or Admin)', 'error');
//     return;
//   }

//   if (!email || !password) {
//     showAlert('Please fill in all fields', 'error');
//     return;
//   }

//   localStorage.setItem('isLoggedIn', 'true');
//   localStorage.setItem('userRole', role);
//   localStorage.setItem('userEmail', email);
//   localStorage.setItem('userName', email.split('@')[0]);

//   if (role === 'patient') {
//     window.location.href = 'patient-dashboard.html';
//   } else {
//     window.location.href = 'admin-dashboard.html';
//   }
// }

// function selectRole(role) {
//   document.querySelectorAll('.role-option').forEach(option => {
//     option.classList.remove('active');
//   });
//   event.target.closest('.role-option').classList.add('active');
// }

// function logout() {
//   localStorage.removeItem('isLoggedIn');
//   localStorage.removeItem('userRole');
//   localStorage.removeItem('userEmail');
//   localStorage.removeItem('userName');
//   window.location.href = 'index.html';
// }

// function showAlert(message, type) {
//   const alertDiv = document.getElementById('alertMessage');
//   if (alertDiv) {
//     alertDiv.className = `alert alert-${type}`;
//     alertDiv.textContent = message;
//     alertDiv.style.display = 'block';

//     setTimeout(() => {
//       alertDiv.style.display = 'none';
//     }, 5000);
//   } else {
//     alert(message);
//   }
// }

// function loadPatientDashboard() {
//   const isLoggedIn = localStorage.getItem('isLoggedIn');
//   const userRole = localStorage.getItem('userRole');
//   const userName = localStorage.getItem('userName');

//   if (!isLoggedIn || userRole !== 'patient') {
//     window.location.href = 'login.html';
//     return;
//   }

//   document.getElementById('patientName').textContent = userName;

//   const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
//   const upcomingAppointments = appointments.filter(apt => new Date(apt.date) >= new Date());

//   document.getElementById('totalAppointments').textContent = appointments.length;
//   document.getElementById('upcomingAppointments').textContent = upcomingAppointments.length;

//   const appointmentsTableBody = document.getElementById('appointmentsTableBody');
//   if (appointmentsTableBody) {
//     if (appointments.length === 0) {
//       appointmentsTableBody.innerHTML = '<tr><td colspan="5" style="text-align: center;">No appointments found</td></tr>';
//     } else {
//       appointmentsTableBody.innerHTML = appointments.map(apt => `
//         <tr>
//           <td>${apt.doctor}</td>
//           <td>${apt.date}</td>
//           <td>${apt.time}</td>
//           <td>${apt.problem}</td>
//           <td><span class="badge badge-success">${apt.status}</span></td>
//         </tr>
//       `).join('');
//     }
//   }
// }

// function loadAdminDashboard() {
//   const isLoggedIn = localStorage.getItem('isLoggedIn');
//   const userRole = localStorage.getItem('userRole');

//   if (!isLoggedIn || userRole !== 'admin') {
//     window.location.href = 'login.html';
//     return;
//   }

//   document.getElementById('totalPatients').textContent = patientsData.length;
//   document.getElementById('totalDoctors').textContent = doctorsData.length;

//   const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
//   document.getElementById('totalAppointments').textContent = appointments.length + appointmentsData.length;
//   document.getElementById('todayAppointments').textContent = appointmentsData.filter(apt => apt.date === new Date().toISOString().split('T')[0]).length;

//   const patientsTableBody = document.getElementById('patientsTableBody');
//   if (patientsTableBody) {
//     patientsTableBody.innerHTML = patientsData.map(patient => `
//       <tr>
//         <td>${patient.name}</td>
//         <td>${patient.age}</td>
//         <td>${patient.gender}</td>
//         <td>${patient.phone}</td>
//         <td>${patient.bloodGroup}</td>
//         <td>${patient.lastVisit}</td>
//       </tr>
//     `).join('');
//   }

//   const appointmentsTableBody = document.getElementById('appointmentsTableBody');
//   if (appointmentsTableBody) {
//     const allAppointments = [...appointmentsData, ...appointments];
//     appointmentsTableBody.innerHTML = allAppointments.map(apt => `
//       <tr>
//         <td>${apt.patientName || apt.patientName || 'N/A'}</td>
//         <td>${apt.doctorName || apt.doctor}</td>
//         <td>${apt.date}</td>
//         <td>${apt.time}</td>
//         <td><span class="badge badge-${apt.status === 'Confirmed' ? 'success' : apt.status === 'Pending' ? 'warning' : 'info'}">${apt.status}</span></td>
//       </tr>
//     `).join('');
//   }
// }

// function checkAuth() {
//   const isLoggedIn = localStorage.getItem('isLoggedIn');
//   if (!isLoggedIn) {
//     const loginBtn = document.querySelector('.nav-menu a[href="login.html"]');
//     if (loginBtn) {
//       loginBtn.textContent = 'Login / Signup';
//     }
//   } else {
//     const loginBtn = document.querySelector('.nav-menu a[href="login.html"]');
//     if (loginBtn) {
//       const userRole = localStorage.getItem('userRole');
//       const dashboardUrl = userRole === 'admin' ? 'admin-dashboard.html' : 'patient-dashboard.html';
//       loginBtn.textContent = 'Dashboard';
//       loginBtn.href = dashboardUrl;
//     }
//   }
// }

// document.addEventListener('DOMContentLoaded', function() {
//   checkAuth();

//   const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
//   if (mobileMenuBtn) {
//     mobileMenuBtn.addEventListener('click', toggleMobileMenu);
//   }

//   const searchInput = document.getElementById('searchDoctor');
//   const specialtyFilter = document.getElementById('specialtyFilter');

//   if (searchInput) {
//     searchInput.addEventListener('input', searchDoctors);
//   }

//   if (specialtyFilter) {
//     specialtyFilter.addEventListener('change', searchDoctors);
//   }

//   if (document.getElementById('doctorsGrid')) {
//     displayDoctors(doctorsData);
//   }

//   const appointmentForm = document.getElementById('appointmentForm');
//   if (appointmentForm) {
//     const selectedDoctor = localStorage.getItem('selectedDoctor');
//     if (selectedDoctor) {
//       document.getElementById('doctor').value = selectedDoctor;
//       localStorage.removeItem('selectedDoctor');
//     }

//     appointmentForm.addEventListener('submit', handleAppointmentForm);
//   }

//   const loginForm = document.getElementById('loginForm');
//   if (loginForm) {
//     loginForm.addEventListener('submit', handleLogin);
//   }

//   if (document.getElementById('patientDashboard')) {
//     loadPatientDashboard();
//   }

//   if (document.getElementById('adminDashboard')) {
//     loadAdminDashboard();
//   }

//   const roleOptions = document.querySelectorAll('.role-option');
//   roleOptions.forEach(option => {
//     option.addEventListener('click', function() {
//       roleOptions.forEach(opt => opt.classList.remove('active'));
//       this.classList.add('active');
//     });
//   });

//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         entry.target.style.opacity = '1';
//         entry.target.style.transform = 'translateY(0)';
//       }
//     });
//   }, { threshold: 0.1 });

//   document.querySelectorAll('.card, .stat-card').forEach(el => {
//     el.style.opacity = '0';
//     el.style.transform = 'translateY(20px)';
//     el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
//     observer.observe(el);
//   });
// });
