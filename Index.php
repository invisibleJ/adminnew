<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - CKC Information Technology</title>
  <link rel="icon" href="logo.png" type="image/png" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS and Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #0d2a4e;
      /* fallback solid blue */
      color: #e0f0ff;
      overflow-x: hidden;
      position: relative;
      min-height: 100vh;
      z-index: 0;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('bg.jpg') no-repeat center center/cover;
      filter: blur(10px) brightness(0.6);
      z-index: -1;
    }

    /* Top Navbar */
    .navbar-blur {
      background: rgba(0, 44, 89, 0.85);
      /* darker blue with opacity */
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(74, 200, 224, 0.15);
    }

    .navbar-blur .navbar-brand {
      color: #4ac8e0;
      font-weight: 600;
    }

    .navbar-blur .nav-link,
    .navbar-blur .navbar-text {
      color: #cde9fb;
    }

    /* Sidebar */
    .sidebar {
      background: rgba(4, 66, 121, 0.75);
      backdrop-filter: blur(12px);
      height: 100vh;
      width: 240px;
      position: fixed;
      top: 56px;
      left: 0;
      padding-top: 1rem;
      border-right: 1px solid rgba(74, 200, 224, 0.15);
      z-index: 1020;
      display: none;
      flex-direction: column;
    }

    .sidebar a {
      color: #a6d1f7;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: rgba(74, 200, 224, 0.25);
      border-left: 4px solid #4ac8e0;
      padding-left: 16px;
      color: #d1f0ff;
    }

    /* 📊 Main Content */
    .main-content {
      margin-left: 240px;
      padding: 90px 30px 30px;
      min-height: calc(100vh - 56px);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }


    @media (max-width: 992px) {
      .main-content {
        margin-left: 0;
        padding: 80px 20px;
      }
    }

    /* 💠 Card Styles */
    .card-glass {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(74, 200, 224, 0.3);
      backdrop-filter: blur(18px);
      border-radius: 20px;
      padding: 25px 20px;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 20px;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
    }

    .card-glass:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 30px rgba(74, 200, 224, 0.3);
    }

    .metric-icon {
      font-size: 3rem;
      color: #4ac8e0;
      opacity: 0.9;
    }

    .card-title {
      font-weight: 600;
      font-size: 1rem;
      color: #aad9f7;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .card-value {
      font-size: 2.4rem;
      font-weight: 700;
      color: #ffffff;
      text-shadow: 0 0 10px rgba(74, 200, 224, 0.5);
    }

    /* 🌟 Gradient Header */
    h2 {
      font-weight: 700;
      background: linear-gradient(90deg, #4ac8e0, #75e3a4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
    }

    p.text-light {
      color: #bcd9ef !important;
    }
  </style>
</head>

<body>

  <!-- Top Navigation -->
  <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <i class="bi bi-building"></i>
        Christ the King College
      </a>

      <!-- Toggle Button for Offcanvas -->
      <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        <i class="bi bi-list fs-4"></i>
      </button>

      <div class="ms-auto d-flex align-items-center gap-3">
        <span class="navbar-text d-none d-md-block">jatis@ckcgingoog.edu.ph</span>

        <!-- Notifications Dropdown -->
        <div class="dropdown">
          <a href="#" class="text-light position-relative" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notifBadge">2</span>
          </a>
          <!-- <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="notifDropdown" style="min-width: 320px;">
            <li class="dropdown-item d-flex justify-content-between align-items-start">
              <div>
                <small class="fw-bold">Student Application</small><br>
                <span>A student wants to join your subject.</span>
              </div>
              <div class="ms-2 d-flex gap-1">
                <button class="btn btn-sm btn-success btn-confirm">Confirm</button>
                <button class="btn btn-sm btn-danger btn-delete">Delete</button>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-item d-flex justify-content-between align-items-start">
              <div>
                <small class="fw-bold">Admin Update</small><br>
                <span>Admin confirmed you in the subject.</span>
              </div>
            </li>
          </ul> -->
        </div>

        <img src="/img/juswa.jpg" class="profile-pic" alt="Prof. Atis" />
      </div>
    </div>
  </nav>

  <!-- Sidebar (Desktop) -->
  <nav class="sidebar d-none d-lg-flex flex-column">
    <li class="nav-item mb-2">
      <a href="Index.php" class="nav-link text-white">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#teacherMenu" role="button" aria-expanded="false" aria-controls="teacherMenu">
        <span><i class="bi bi-person-badge me-2"></i>Faculty</span>
        <i class="bi bi-caret-down-fill small"></i>
      </a>

      <!-- Dropdown Items -->
      <div class="collapse ps-3" id="teacherMenu">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="addFaculty.php" class="nav-link text-white-50">
              <i class="bi bi-person-plus me-2"></i> Add Faculty
            </a>
          </li>
          <li class="nav-item">
            <a href="Manage_Faculty.php" class="nav-link text-white-50">
              <i class="bi bi-people me-2"></i> Manage Faculty
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#subjectMenu" role="button" aria-expanded="false" aria-controls="subjectMenu">
        <span><i class="bi bi-journal-text me-2"></i> Subject</span>
        <i class="bi bi-caret-down-fill small"></i>
      </a>

      <div class="collapse ps-3" id="subjectMenu">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="addSubject.php" class="nav-link text-white-50">
              <i class="bi bi-plus-circle me-2"></i> Add Subject
            </a>
          </li>
          <li class="nav-item">
            <a href="Manage_Subject.php" class="nav-link text-white-50">
              <i class="bi bi-list-check me-2"></i> Manage Subject
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Logout -->
    <li class="nav-item mt-3">
      <a href="logout.php" class="nav-link text-danger">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </a>
    </li>
  </nav>



  <!-- Main Content -->
  <main class="main-content">
    <div class="container-fluid">
      <h2>Admin Dashboard</h2>
      <p class="text-light">Overview of your total subjects and instructors.</p>

      <div class="row g-4 my-4 justify-content-center">

        <!-- Card 1 - Instructors -->
        <div class="col-md-5 col-lg-4">
          <a href="Manage_Faculty.php" class="text-decoration-none">
            <div class="card-glass hover-card">
              <i class="bi bi-person-badge metric-icon"></i>
              <div>
                <div class="card-title">Total Instructors</div>
                <div class="card-value">12</div>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 2 - Subjects -->
        <div class="col-md-5 col-lg-4">
          <a href="Manage_Subject.php" class="text-decoration-none">
            <div class="card-glass hover-card">
              <i class="bi bi-journal-text metric-icon"></i>
              <div>
                <div class="card-title">Total Subjects</div>
                <div class="card-value">18</div>
              </div>
            </div>
          </a>
        </div>

      </div>

    </div>
  </main>



  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Logic -->
  <script>
    const DB = {
      mySubjects: [{
        code: 'CS101',
        title: 'Intro to CS',
        units: 3
      }],
      pending: [{
        code: 'MATH200',
        title: 'Calculus II',
        units: 4,
        applicants: 2
      }],
      notifications: 2,
      activity: [
        'You approved 2 students for CS101',
        'New application for MATH200'
      ]
    };

    function renderDashboard() {
      document.getElementById('countMySubjects').textContent = DB.mySubjects.length;
      document.getElementById('countPending').textContent = DB.pending.length;
      document.getElementById('countNotifs').textContent = DB.notifications;

      const activityList = document.getElementById('activityList');
      activityList.innerHTML = '';
      DB.activity.forEach(item => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = item;
        activityList.appendChild(li);
      });
    }

    renderDashboard();

    // Handle notification actions
    document.querySelectorAll(".btn-confirm").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("Student confirmed!");
      });
    });

    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("Request deleted!");
      });
    });
  </script>

</body>

</html>