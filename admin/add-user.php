<?php
include('../dbcon.php');

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($name) || empty($email) || empty($password)) {
        $message = '<div class="alert alert-danger">⚠️ All fields are required.</div>';
    } else {
        // Check if email exists
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
        if (mysqli_num_rows($check) > 0) {
            $message = '<div class="alert alert-warning">⚠️ Email already exists.</div>';
        } else {
            // Insert user
            $query = "INSERT INTO users (`username`, `email`, `password`) 
                      VALUES ('$name', '$email', '$password')";

            if (mysqli_query($conn, $query)) {
                $message = '<div class="alert alert-success">✅ User added successfully!</div>';
            } else {
                $message = '<div class="alert alert-danger">❌ Database error: ' . mysqli_error($conn) . '</div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add User - Inventides Admin</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #0a0a23;
      color: #fff;
      font-family: "Poppins", sans-serif;
    }

    .sidebar {
      background-color: #0d0d30;
      height: 100vh;
      padding: 30px 15px;
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
    }

    .sidebar img {
      width: 140px;
      display: block;
      margin: 0 auto 20px;
    }

    .sidebar a {
      display: block;
      color: #ccc;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 8px;
      margin-bottom: 10px;
      transition: all 0.3s ease;
    }

    .sidebar a.active,
    .sidebar a:hover {
      background-color: #007bff;
      color: #fff;
    }

    .main {
      margin-left: 260px;
      padding: 50px;
      background-color: #0b0b25;
      min-height: 100vh;
    }

    .card {
      background-color: #12123b;
      border: none;
      border-radius: 14px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      padding: 25px;
      max-width: 700px;
      margin: 0 auto;
      color: #aaa;
    }

    .form-control {
      background-color: #0b0b25;
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #005ecb;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.4);
    }

    footer {
      color: #aaa;
      font-size: 14px;
      text-align: center;
      margin-top: 50px;
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 15px;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <img src="../assets/images/logo/logo.png" alt="Inventides Logo">
    <a href="dashboard.php"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
    <a href="admin-products.php"><i class="fa-solid fa-box me-2"></i>Manage Products</a>
    <a href="admin-users.php" class="active"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
    <a href="admin-reviews.php"><i class="fa-solid fa-star me-2"></i>Reviews</a>
    <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>➕ Add New User</h2>
        <a href="admin-users.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Back to Users</a>
      </div>

      <div class="card">
        <h4 class="mb-3"><i class="fa-solid fa-user-plus me-2"></i>Create User Account</h4>
        <?php echo $message; ?>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Enter password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3">
            <i class="fa-solid fa-user-plus me-2"></i> Add User
          </button>
        </form>
      </div>
    </div>

    <footer>
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
