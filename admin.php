<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Teacher | TSAS Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    .form-label {
      font-weight: 500;
    }
    .header {
      background-color: #fff;
      padding: 15px 25px;
      margin-bottom: 25px;
      border-bottom: 1px solid #dee2e6;
    }
    .header h4 {
      margin: 0;
      color: #444;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="header">
    <h4>Admin</h4>
  </div>

  <div class="container">
    <div class="card p-4">
      <h5 class="mb-4">Add Teacher</h5>
      <form action="insert-teacher.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">First Name*</label>
            <input type="text" name="first_name" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Last Name*</label>
            <input type="text" name="last_name" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Mobile Number</label>
            <input type="text" name="mobile" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label">Gender*</label>
            <select name="gender" class="form-select" required>
              <option value="">Please Select Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label">Emp ID</label>
            <input type="text" name="emp_id" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course" class="form-select">
              <option value="">Select Course</option>
              <option>BSIT</option>
              <option>BSCS</option>
              <option>BSIS</option>
            </select>
          </div>
          
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea name="address" rows="2" class="form-control"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Teacher Photo (150x150)</label>
          <input type="file" name="photo" class="form-control">
        </div>

        <div class="text-end">
          <button type="submit" name="save" class="btn btn-warning text-white">Save</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
