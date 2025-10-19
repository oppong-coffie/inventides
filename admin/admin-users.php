<?php
include('../dbcon.php');

// Fetch all users
$users = mysqli_query($conn, "SELECT * FROM users");

// Summary count
$total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Users - Inventides Admin</title>

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

    .sidebar a.active, .sidebar a:hover {
      background-color: #007bff;
      color: #fff;
    }

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
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .stat-card {
      background: #12123b;
      border-radius: 14px;
      text-align: center;
      padding: 30px 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      margin-bottom: 30px;
    }

    .card {
      background-color: #12123b;
      border: none;
      border-radius: 14px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      padding: 25px;
      color: #ccc;
    }

    .table thead {
      background: #007bff;
      color: #fff;
    }

    .table-hover tbody tr:hover {
      background-color: rgba(0, 123, 255, 0.1);
      transition: 0.3s ease;
    }

    .password-mask {
      letter-spacing: 3px;
      color: #00c4ff;
      font-weight: 600;
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

    .modal-content {
      background-color: #12123b;
      color: #fff;
      border-radius: 12px;
      border: 1px solid rgba(0,123,255,0.3);
    }

    .modal-header {
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .form-control {
      background-color: #0b0b25;
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
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
    <div class="dashboard-header">
      <h2>👥 Manage Users</h2>
      <a href="add-user.php" class="btn btn-primary">
        <i class="fa-solid fa-user-plus me-2"></i>Add New User
      </a>
    </div>

    <div class="row mb-4">
      <div class="col-md-4">
        <div class="stat-card">
          <h5>Total Users</h5>
          <h2><?php echo $total_users; ?></h2>
        </div>
      </div>
    </div>

    <div class="card">
      <h4><i class="fa-solid fa-users me-2"></i>User List</h4>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Created At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($users) > 0): ?>
              <?php $i = 1; while ($user = mysqli_fetch_assoc($users)): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo htmlspecialchars($user['username'] ?? 'N/A'); ?></td>
                  <td><?php echo htmlspecialchars($user['email']); ?></td>
                  <td class="password-mask"><?php echo htmlspecialchars($user['password']); ?></td>
                  <td><?php echo date('M d, Y', strtotime($user['created_at'] ?? 'now')); ?></td>
                  <td>
                    <button class="btn btn-sm btn-info text-white" 
                            onclick='openViewModal(<?php echo json_encode($user); ?>)'>
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-warning text-dark" 
                            onclick='openEditModal(<?php echo json_encode($user); ?>)'>
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteUser(<?php echo $user['id']; ?>)">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <footer>
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <!-- VIEW USER MODAL -->
  <div class="modal fade" id="viewUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">👤 View User</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Full Name:</strong> <span id="viewName"></span></p>
          <p><strong>Email:</strong> <span id="viewEmail"></span></p>
          <p><strong>Password:</strong> <span id="viewPassword" class="password-mask"></span></p>
          <p><strong>Created At:</strong> <span id="viewDate"></span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- EDIT USER MODAL -->
  <div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">✏️ Edit User</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="editUserForm">
            <input type="hidden" id="editUserId">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" id="editName" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" id="editEmail" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="text" class="form-control" id="editPassword">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // View Modal Function
    function openViewModal(user) {
      document.getElementById('viewName').textContent = user.username || 'N/A';
      document.getElementById('viewEmail').textContent = user.email || 'N/A';
      document.getElementById('viewPassword').textContent = user.password || '********';
      document.getElementById('viewDate').textContent = user.created_at;
      new bootstrap.Modal(document.getElementById('viewUserModal')).show();
    }

    // Edit Modal Function
    function openEditModal(user) {
      document.getElementById('editUserId').value = user.id;
      document.getElementById('editName').value = user.username;
      document.getElementById('editEmail').value = user.email;
      document.getElementById('editPassword').value = user.password;
      new bootstrap.Modal(document.getElementById('editUserModal')).show();
    }

    // Handle Edit Form Submit
    document.getElementById('editUserForm').addEventListener('submit', e => {
      e.preventDefault();
      const id = document.getElementById('editUserId').value;
      const name = document.getElementById('editName').value;
      const email = document.getElementById('editEmail').value;
      const password = document.getElementById('editPassword').value;

      fetch('../routes/update-user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
      })
      .then(res => res.json())
      .then(data => {
        alert(data.message);
        if (data.status === 'success') location.reload();
      })
      .catch(() => alert('⚠️ Failed to update user.'));
    });

    // Delete User
    function deleteUser(id) {
      if (!confirm("Are you sure you want to delete this user?")) return;
      fetch('../routes/delete-user.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'id=' + id
      })
      .then(res => res.json())
      .then(data => {
        alert(data.message);
        if (data.status === 'success') location.reload();
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
