<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Subject Allocation - CKC Information Technology</title>
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
            color: #e0f0ff;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
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

        /* Main Content */
        .main-content {
            margin-left: 225px;
            padding: 120px 20px 30px;
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }
        }

        /* Card Styles */
        .card-glass {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(74, 200, 224, 0.3);
            backdrop-filter: blur(18px);
            border-radius: 15px;
            padding: 25px;
            color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        }

        .card-glass:hover {
            transform: translateY(-6px);
            transition: 0.3s ease;
        }

        .btn-custom {
            background-color: #4ac8e0;
            color: #0f172a;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #6de4ff;
        }

        .search-bar {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
        }

        .search-bar::placeholder {
            color: #000000ff;
        }

        h2 {
            font-weight: 1000;
            background: linear-gradient(90deg, #4ac8e0, #75e3a4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .table-dark {
            --bs-table-bg: rgba(255, 255, 255, 0.05);
            --bs-table-border-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .table th {
            color: #4ac8e0;
        }

        /* Profile Picture */
        .profile-pic {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4ac8e0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-building"></i>
                Christ the King College
            </a>
            <button class="btn btn-outline-light d-lg-none" id="menuToggle">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block">jatis@ckcgingoog.edu.ph</span>
                <img src="/img/juswa.jpg" class="profile-pic" alt="Prof. Atis" />
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <a href="Index.php"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
        <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#teacherMenu">
            <span><i class="bi bi-person-badge me-2"></i> Faculty</span>
            <i class="bi bi-caret-down-fill small"></i>
        </a>
        <div class="collapse" id="teacherMenu">
            <a href="addFaculty.php" class="ps-4"><i class="bi bi-person-plus me-2"></i> Add Faculty</a>
            <a href="Manage_Faculty.php" class="ps-4"><i class="bi bi-people me-2"></i> Manage Faculty</a>
        </div>

        <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#subjectMenu">
            <span><i class="bi bi-journal-text me-2"></i> Subject</span>
            <i class="bi bi-caret-down-fill small"></i>
        </a>
        <div class="collapse" id="subjectMenu">
            <a href="addSubject.php" class="ps-4"><i class="bi bi-plus-circle me-2"></i> Add Subject</a>
            <a href="Manage_Subject.php" class="ps-4"><i class="bi bi-list-check me-2"></i> Manage Subject</a>
        </div>

        <a href="logout.php" class="text-danger mt-3"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </nav>

    <!-- Main Content -->
    <div class="main-content container">
        <h2>Teacher Subject Allocation System</h2>

        <div class="card-glass mb-4">
            <form class="d-flex align-items-center">
                <input type="text" class="form-control search-bar me-2" placeholder="Search teacher by name or ID">
                <button type="button" class="btn btn-custom">Search</button>
            </form>
        </div>

        <div class="card-glass">
            <h5 class="mb-3">Result against <span class="text-info">"test"</span> keyword</h5>
            <table class="table table-dark table-hover mb-0">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Faculty Name</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Unit</th>
                        <th>Allocation Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Test Sample (Emp101)</td>
                        <td>Information Technology (BSIT)</td>
                        <td>Database Systems</td>
                        <td>3</td>
                        <td>2025-10-06 09:45:22</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Doe (Emp102)</td>
                        <td>Computer Science (BSCS)</td>
                        <td>Object-Oriented Programming</td>
                        <td>032665</td>
                        <td>2025-10-06 10:10:40</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar toggle for mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>

</html>