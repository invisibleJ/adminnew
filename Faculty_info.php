<?php
// Sample teacher data (replace with actual DB query later)
$teacher = [
    "First Name" => "Janna",
    "Last Name" => "Ocliaman",
    "Gender" => "Female",
    "Email" => "jannaocliaman@gmail.com",
    "Mobile Number" => "09973054698",
    "ID Number" => "C23-0131",

];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Faculty Info - CKC Information Technology</title>
    <link rel="icon" href="logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: #0d2a4e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e0f0ff;
            margin: 0;
            min-height: 100vh;
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

        .navbar-blur {
            background: rgba(0, 44, 89, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(74, 200, 224, 0.15);
        }

        .navbar-blur .navbar-brand {
            color: #4ac8e0;
            font-weight: 600;
        }

        .navbar-text {
            color: #cde9fb;
        }



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
            display: flex;
            flex-direction: column;
            z-index: 1020;
        }

        .sidebar a {
            color: #ecf0f4ff;
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
            color: #d1f0ff;
        }

        .main-content {
            margin-left: 240px;
            padding: 90px 40px 30px;
            text-align: center;
        }

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

        .teacher-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(74, 200, 224, 0.3);
            backdrop-filter: blur(18px);
            border-radius: 20px;
            padding: 30px;
            color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            max-width: 800px;
            margin: 40px auto;
        }

        .teacher-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #4ac8e0;
            margin-bottom: 15px;
        }

        .info-title {
            color: #75e3a4;
            font-weight: 600;
        }

        .about-tab {
            font-weight: 600;
            color: #4ac8e0;
            text-transform: uppercase;
            margin-bottom: 20px;
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
    <!-- Sidebar -->
    <nav class="sidebar d-none d-lg-flex flex-column">
        <a href="Index.php"><i class="bi bi-speedometer2"></i> Dashboard</a>

        <a data-bs-toggle="collapse" href="#teacherMenu" role="button" aria-expanded="false">
            <i class="bi bi-person-badge"></i> Teacher <i class="bi bi-caret-down-fill small ms-auto"></i>
        </a>
        <div class="collapse show ps-3" id="teacherMenu">
            <a href="addFaculty.php"><i class="bi bi-person-plus"></i> Add Teacher</a>
            <a href="Manage_Faculty.php" class="active"><i class="bi bi-people"></i> Manage Teacher</a>
        </div>

        <a data-bs-toggle="collapse" href="#subjectMenu" role="button" aria-expanded="false">
            <i class="bi bi-journal-text"></i> Subject <i class="bi bi-caret-down-fill small ms-auto"></i>
        </a>
        <div class="collapse ps-3" id="subjectMenu">
            <a href="addSubject.php"><i class="bi bi-plus-circle"></i> Add Subject</a>
            <a href="Manage_Subject.php"><i class="bi bi-list-check"></i> Manage Subject</a>
        </div>

        <!-- Logout -->
        <li class="nav-item mt-3">
            <a href="logout.php" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Teacher Details</h2>
        <p class="text-light">Dashboard / Teacher Details</p>

        <div class="teacher-card">
            <img src="cam.jpg" alt="Teacher Photo">

            <h4><?php echo htmlspecialchars($teacher['First Name']); ?></h4>
            <div class="about-tab">About</div>

            <form method="POST" action="update_faculty.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="row text-start">
                    <div class="col-md-6">
                        <p><span class="info-title">First Name:</span>
                            <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($teacher['First Name']); ?>">
                        </p>
                        <p><span class="info-title">Last Name:</span>
                            <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($teacher['Last Name']); ?>">
                        </p>
                        <p><span class="info-title">Gender:</span>
                            <select name="gender" class="form-select">
                                <option value="Male" <?php if ($teacher['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if ($teacher['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </p>
                        <p><span class="info-title">Email:</span>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($teacher['Email']); ?>">
                        </p>
                        <p><span class="info-title">Mobile Number:</span>
                            <input type="text" name="mobile" class="form-control" value="<?php echo htmlspecialchars($teacher['Mobile Number']); ?>">
                        </p>
                        <p><span class="info-title">ID Number:</span>
                            <input type="text" name="id_number" class="form-control" value="<?php echo htmlspecialchars($teacher['ID Number']); ?>">
                        </p>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Save Changes</button>
            </form>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>