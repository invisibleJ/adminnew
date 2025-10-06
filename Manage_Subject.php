<?php
// Sample subject data (replace with DB fetch later)
$subjects = [
    ["id" => 1, "Subject Code" => "IT101", "Subject Name" => "Introduction to Computing", "Units" => 3, "Faculty" => "Prof. Ditan"],
    ["id" => 2, "Subject Code" => "IT102", "Subject Name" => "Computer Programming", "Units" => 3, "Faculty" => "Prof. Kiunisala"],
    ["id" => 3, "Subject Code" => "IT103", "Subject Name" => "Data Structures", "Units" => 4, "Faculty" => "Prof. Escabarte"],
    ["id" => 4, "Subject Code" => "IT104", "Subject Name" => "Database Management Systems", "Units" => 3, "Faculty" => "Prof. Ramoso"],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Subject - CKC Information Technology</title>
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

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('bg.jpg') center/cover no-repeat;
            filter: blur(8px) brightness(0.7);
            z-index: -1;
        }

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
            text-shadow: 0 0 6px rgba(174, 226, 255, 0.6);
        }

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

    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-journal-text"></i>
                Christ the King College
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block">jatis@ckcgingoog.edu.ph</span>
                <div class="dropdown">
                    <a href="#" class="text-light position-relative" id="notifDropdown" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
                    </a>
                </div>
                <img src="/img/juswa.jpg" class="rounded-circle" width="36" height="36" alt="Prof. Atis">
            </div>
        </div>
    </nav>

    <nav class="sidebar d-none d-lg-flex flex-column">
        <li class="nav-item mb-2">
            <a href="Index.php" class="nav-link text-white">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#facultyMenu">
                <span><i class="bi bi-person-badge me-2"></i>Faculty</span>
                <i class="bi bi-caret-down-fill small"></i>
            </a>
            <div class="collapse ps-3" id="facultyMenu">
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
            <a class="nav-link active d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#subjectMenu">
                <span><i class="bi bi-journal-text me-2"></i> Subject</span>
                <i class="bi bi-caret-down-fill small"></i>
            </a>
            <div class="collapse show ps-3" id="subjectMenu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="addSubject.php" class="nav-link text-white-50">
                            <i class="bi bi-plus-circle me-2"></i> Add Subject
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Manage_Subject.php" class="nav-link text-white">
                            <i class="bi bi-list-check me-2"></i> Manage Subject
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item mt-3">
            <a href="logout.php" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </nav>

    <main class="main-content">
        <div class="container">
            <h2>Manage Subject</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-light">Dashboard / Manage Subject</li>
                </ol>
            </nav>

            <div class="table-container mt-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>
                                <th>Faculty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $s): ?>
                                <tr>
                                    <td><?= $s['id']; ?></td>
                                    <td><?= htmlspecialchars($s['Subject Code']); ?></td>
                                    <td><?= htmlspecialchars($s['Subject Name']); ?></td>
                                    <td><?= htmlspecialchars($s['Units']); ?></td>
                                    <td><?= htmlspecialchars($s['Faculty']); ?></td>
                                    <td><a href="editSubject.php?id=<?= $s['id']; ?>"><button class="btn btn-edit">Edit Details</button></a></td>
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