<?php include('../dbcon.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Products | Inventides Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
      margin-left: 270px;
      padding: 40px;
    }
    .filter-bar {
      background-color: #111133;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 30px;
    }
    .filter-bar input, .filter-bar select {
      background-color: #151540;
      color: #fff;
      border: 1px solid #333;
      border-radius: 6px;
      padding: 6px 10px;
    }
    .filter-bar input:focus, .filter-bar select:focus {
      border-color: #00c4ff;
      outline: none;
    }
    .table {
      color: #fff;
      border-color: #222;
    }
    .table th {
      background-color: #111133;
      color: #007bff;
      border-bottom: 2px solid #00c4ff;
    }
    .table td {
      background-color: #151540;
      vertical-align: middle;
      color: #00c4ff;
    }
    .table img {
      width: 70px;
      height: 70px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid #333;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3><img src="../assets/images/logo/logo.png" alt="Inventides" width="140"></h3>
    <a href="dashboard.php"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
    <a href="admin-products.php" class="active"><i class="fa-solid fa-box me-2"></i>Manage Products</a>
    <a href="admin-users.php"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
    <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
  </div>

  <div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-info"><i class="fa-solid fa-box me-2"></i>All Products</h2>
      <a href="addproduct.php" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Add Product</a>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
      <form id="filterForm" class="row g-3 align-items-end">
        <div class="col-md-4">
          <label for="search" class="form-label">Search</label>
          <input type="text" id="search" name="search" class="form-control" placeholder="Type to search...">
        </div>

        <div class="col-md-3">
          <label for="category" class="form-label">Category</label>
          <select name="category" id="category" class="form-select">
            <option value="">All Categories</option>
            <?php
            $catRes = mysqli_query($conn, "SELECT DISTINCT category FROM items WHERE category IS NOT NULL AND category != ''");
            while ($cat = mysqli_fetch_assoc($catRes)) {
              echo "<option value='{$cat['category']}'>{$cat['category']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-3">
          <label for="tag" class="form-label">Tag</label>
          <select name="tag" id="tag" class="form-select">
            <option value="">All Tags</option>
            <?php
            $tagRes = mysqli_query($conn, "SELECT DISTINCT tags FROM items WHERE tags IS NOT NULL AND tags != ''");
            while ($tag = mysqli_fetch_assoc($tagRes)) {
              echo "<option value='{$tag['tags']}'>{$tag['tags']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-2 text-end">
          <button type="submit" class="btn btn-info w-100"><i class="fa-solid fa-filter me-1"></i>Filter</button>
        </div>
      </form>
    </div>

    <!-- Products Table -->
    <div id="productTable"></div>

    <footer class="mt-5 text-center text-secondary">
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
  function loadProducts() {
    const search = $("#search").val();
    const category = $("#category").val();
    const tag = $("#tag").val();

    $.ajax({
      url: "../routes/search_products.php",
      method: "GET",
      data: { search, category, tag },
      success: function(data) {
        $("#productTable").html(data);
      }
    });
  }

  $(document).ready(function() {
    loadProducts(); // initial load

    // Live search typing
    $("#search").on("keyup", function() {
      loadProducts();
    });

    // Filter dropdown change
    $("#filterForm").on("change submit", function(e) {
      e.preventDefault();
      loadProducts();
    });
  });
  </script>
</body>
</html>
