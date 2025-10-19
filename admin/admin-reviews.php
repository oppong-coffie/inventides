<?php
include('../dbcon.php');

// Fetch all reviews
$reviews = mysqli_query($conn, "SELECT * FROM reviews ORDER BY created_at DESC");

// Count total reviews
$total_reviews = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM reviews"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Reviews - Inventides Admin</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #0a0a23;
      color: #fff;
      font-family: "Poppins", sans-serif;
    }

    /* Sidebar */
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

    /* Main content */
    .main {
      margin-left: 260px;
      padding: 50px;
      background-color: #0b0b25;
      min-height: 100vh;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      color: #fff;
    }

    /* Stat Card */
    .stat-card {
      background: #12123b;
      border-radius: 14px;
      text-align: center;
      padding: 30px 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      margin-bottom: 30px;
    }

    .stat-card h5 {
      color: #aaa;
      margin-bottom: 10px;
    }

    .stat-card h2 {
      color: #00c4ff;
      font-weight: 700;
    }

    /* Table */
    .card {
      background-color: #12123b;
      border: none;
      border-radius: 14px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      padding: 25px;
      color: #fff;
    }

    .table {
      color: #fff;
    }

    .table thead {
      background: #007bff;
      color: #fff;
    }

    .table-hover tbody tr:hover {
      background-color: rgba(0, 123, 255, 0.1);
      transition: 0.3s ease;
    }

    .btn-sm {
      border-radius: 6px;
      font-size: 13px;
      padding: 5px 10px;
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
    <a href="admin-users.php"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
    <a href="admin-reviews.php" class="active"><i class="fa-solid fa-star me-2"></i>Reviews</a>
    <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="container-fluid">
      <div class="dashboard-header">
        <h2>⭐ Manage Reviews</h2>
      </div>

      <!-- Stat Card -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="stat-card">
            <h5>Total Reviews</h5>
            <h2><?php echo $total_reviews; ?></h2>
          </div>
        </div>
      </div>

      <!-- Reviews Table -->
      <div class="card">
        <h4><i class="fa-solid fa-comments me-2"></i>Review List</h4>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (mysqli_num_rows($reviews) > 0): ?>
                <?php $i = 1; while ($r = mysqli_fetch_assoc($reviews)): ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($r['name']); ?></td>
                    <td><?php echo htmlspecialchars($r['email']); ?></td>
                    <td><?php echo htmlspecialchars(substr($r['message'], 0, 40)) . '...'; ?></td>
                    <td><?php echo date('M d, Y', strtotime($r['created_at'])); ?></td>
                    <td>
                      <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $r['id']; ?>">
                        <i class="fa-solid fa-eye"></i>
                      </button>
                      <button class="btn btn-sm btn-danger" onclick="deleteReview(<?php echo $r['id']; ?>)">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                  <!-- View Modal -->
                  <div class="modal fade" id="viewModal<?php echo $r['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                          <h5 class="modal-title">Review by <?php echo htmlspecialchars($r['name']); ?></h5>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <p><strong>Email:</strong> <?php echo htmlspecialchars($r['email']); ?></p>
                          <p><strong>Message:</strong></p>
                          <p><?php echo nl2br(htmlspecialchars($r['message'])); ?></p>
                          <p class="text-muted small"><i class="fa-regular fa-clock me-1"></i> 
                            Posted on <?php echo date('M d, Y - h:i A', strtotime($r['created_at'])); ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>
              <?php else: ?>
                <tr><td colspan="6" class="text-center text-muted">No reviews found.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <footer>
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <script>
  function deleteReview(id) {
    if (!confirm("Are you sure you want to delete this review?")) return;
    fetch('../routes/delete-review.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'id=' + id
    })
    .then(res => res.json())
    .then(data => {
      alert(data.message);
      if (data.status === 'success') location.reload();
    })
    .catch(() => alert('⚠️ Error deleting review.'));
  }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
