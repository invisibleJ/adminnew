<?php
// Sample teacher data
$teachers = [
    ["id" => 1, "First Name" => "Cj", "Last Name" => "Kiunisala", "Faculty ID" => "C23-0123", "Mobile Number" => "09348451313", "Email" => "cj@gmail.com"],
    ["id" => 2, "First Name" => "Bibo", "Last Name" => "Escabarte", "Faculty ID" => "C23-0111", "Mobile Number" => "0931315513", "Email" => "bibo@gmail.com"],
    ["id" => 3, "First Name" => "Jericho", "Last Name" => "Ditan", "Faculty ID" => "C23-0222", "Mobile Number" => "0976132546", "Email" => "jericho@gmail.com"],
    ["id" => 4, "First Name" => "Lordwen", "Last Name" => "Ramoso", "Faculty ID" => "C23-0333", "Mobile Number" => "093656541", "Email" => "lordwen@gmail.com"],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Faculty - CKC Information Technology</title>
    <link rel="icon" href="logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #051937, #004d7a, #008793, #00bf72, #a8eb12);
            color: #f0faff;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Glass Background Overlay */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('bg.jpg') center/cover no-repeat;
            filter: blur(8px) brightness(0.7);
            z-index: -1;
        }

        /* Navbar */
        .navbar-blur {
            background: rgba(0, 25, 51, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            color: #4ac8e0 !important;
            font-weight: 600;
        }

        .navbar-text {
            color: #aee2ff !important;

            font-weight: 500;
        }


        /* Sidebar */
        .sidebar {
            background: rgba(0, 32, 64, 0.8);
            backdrop-filter: blur(12px);
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 56px;
            left: 0;
            padding-top: 1rem;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar a {
            color: #aee2ff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(74, 200, 224, 0.2);
            border-left: 4px solid #4ac8e0;
            color: #fff;
        }

        /* Main content */
        .main-content {
            margin-left: 240px;
            padding: 80px 30px 40px;
        }

        h2 {
            font-weight: 700;
            font-size: 2rem;
            text-align: center;
            background: linear-gradient(90deg, #4ac8e0, #a8eb12);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .breadcrumb {
            justify-content: center;
            background: none;
            color: #aad9f7;
        }




        .table-container {
            background: rgba(255, 255, 255, 0.02);
            /* faint frost */
            border: 1px solid rgba(74, 200, 224, 0.3);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 25px rgba(74, 200, 224, 0.2);
            transition: 0.3s;
        }

        .table {
            background-color: transparent !important;
        }


        /* Make all table cells transparent */
        .table th,
        .table td {
            background-color: transparent !important;
            color: #ffffff !important;
        }

        /* Remove white border lines */
        .table-bordered th,
        .table-bordered td {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        /* Add a soft glowing divider line between rows */
        .table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Hover effect for better visibility */
        .table tbody tr:hover {
            background: rgba(74, 200, 224, 0.08) !important;
        }


        .btn-edit {
            background: linear-gradient(90deg, #00c292, #00bf72);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            transition: 0.3s;
        }

        .btn-edit:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #00bf72, #4ac8e0);
        }

        footer {
            text-align: center;
            color: #aad9f7;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        footer span {
            color: #4ac8e0;
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding-top: 90px;
            }
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
                <span class="navbar-text d-none d-md-block" style="color: white;">jatis@ckcgingoog.edu.ph</span>


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
                        <a href="Faculty_info.php" class="nav-link text-white-50">
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


    <!-- Main -->
    <main class="main-content">
        <div class="container">
            <h2>Manage Faculty</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-light">Dashboard / Manage Faculty</li>
                </ol>
            </nav>

            <div class="table-container mt-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th>F.No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Faculty ID</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teachers as $t): ?>
                                <tr>
                                    <td><?= $t['id']; ?></td>
                                    <td><?= htmlspecialchars($t['First Name']); ?></td>
                                    <td><?= htmlspecialchars($t['Last Name']); ?></td>
                                    <td><?= htmlspecialchars($t['Faculty ID']); ?></td>
                                    <td><?= htmlspecialchars($t['Mobile Number']); ?></td>
                                    <td><?= htmlspecialchars($t['Email']); ?></td>
                                    <td><a href="Faculty_info.php"><button class="btn btn-edit">Edit Details</button></a></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <footer class="mt-4">
                <p>© 2025 <span>Christ the King College</span>. All rights reserved.</p>
            </footer>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>