<?php
include('../dbcon.php');



// Summary counts
$total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
$total_items = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM items"))['total'];
// $total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - Inventides</title>

  <!-- Bootstrap 5 CDN -->
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
      overflow-y: auto;
    }

    .sidebar h3 {
      color: #00c4ff;
      margin-bottom: 30px;
      font-weight: 600;
      text-align: center;
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
      padding: 40px;
    }

    .card {
      background-color: #111133;
      border: none;
      border-radius: 12px;
      color: #fff;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    footer {
      color: #aaa;
      font-size: 14px;
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3>
    <img src="../assets/images/logo/logo.png" alt="logo__image">

</h3>
    <a href="dashboard.php" class="active"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
    <a href="admin-products.php"><i class="fa-solid fa-box me-2"></i>Manage Products</a>
    <a href="admin-users.php"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Reviews</a>
    <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
  </div>

  <!-- Main content -->
  <div class="main">
    <nav class="navbar navbar-dark mb-4 rounded shadow-sm" style="background-color:#0d0d30;">
      <div class="container-fluid justify-content-between">
        <span class="navbar-brand mb-0 h1">Dashboard Overview</span>
        <span><?php echo date("l, F j, Y"); ?></span>
      </div>
    </nav>

    <!-- Dashboard Cards -->
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fa-solid fa-users"></i>
          <h5>Total Users</h5>
          <h3><?php echo $total_users; ?></h3>
        </div>
      </div>

      <div class="col-md-4">
            <a href="./admin-products.php">
        <div class="card p-4 text-center">
          <i class="fa-solid fa-box"></i>
          <h5>Total Products</h5>
          <h3><?php echo $total_items; ?></h3>
        </div>
    </a>
      </div>
      

      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fa-solid fa-bag-shopping"></i>
          <h5>Total Orders</h5>888
          <!-- <h3><?php echo $total_orders; ?></h3> -->
        </div>
      </div>
    </div>

    <!-- Manage Section -->
    <div class="mt-5">
      <h4>Quick Management</h4>
      <div class="row g-4 mt-3">
        <div class="col-md-4">
            <a href="./addproduct.php">
               <button class="btn btn-primary w-100 py-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fa-solid fa-plus-circle me-2"></i>Add New Product
          </button>  
            </a>
         
        </div>
        <div class="col-md-4">
          <a href="admin-users.php" class="btn btn-info w-100 py-3">
            <i class="fa-solid fa-user-shield me-2"></i>View Users
          </a>
        </div>
        <div class="col-md-4">
          <a href="admin-orders.php" class="btn btn-success w-100 py-3">
            <i class="fa-solid fa-list-check me-2"></i>Check Orders
          </a>
        </div>
      </div>
    </div>

    <footer class="mt-5">
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <!-- Bootstrap JS -->
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







