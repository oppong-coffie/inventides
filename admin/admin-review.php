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

        footer {
            color: #aaa;
            font-size: 14px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- START:: Sidebar -->
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
        <!-- END:: Sidebar -->


    <!-- START:: Main content -->
    <div class="main">
      

    

        <footer class="mt-5">
            &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>