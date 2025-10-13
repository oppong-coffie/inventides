<?php
include('../dbcon.php');

// Summary counts
$total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
$total_items = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM items"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New Product | Inventides Admin</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background-color: #0a0a23;
      color: #fff;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
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

    .sidebar h3 img {
      width: 140px;
      margin-bottom: 20px;
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

    .container {
      max-width: 950px;
      background-color: #111133;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0,0,0,0.3);
    }

    h2 {
      text-align: center;
      color: #00c4ff;
      margin-bottom: 30px;
      font-weight: 600;
    }

    label {
      font-weight: 500;
      color: #ddd;
      margin-bottom: 6px;
    }

    .form-control, textarea {
      background-color: #0a0a23;
      color: #fff;
      border: 1px solid #333;
      border-radius: 8px;
    }

    .form-control:focus, textarea:focus {
      border-color: #00c4ff;
      box-shadow: none;
    }

    .btn-primary {
      background: linear-gradient(90deg, #007bff, #00c4ff);
      border: none;
      font-weight: 500;
      padding: 10px 25px;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #0056b3, #0089d6);
      transform: translateY(-2px);
    }

    .preview img {
      width: 100px;
      height: 100px;
      margin: 5px;
      border-radius: 8px;
      border: 1px solid #333;
      object-fit: cover;
    }

    .category-options .btn-check:checked + .btn {
      background-color: #00c4ff;
      color: #fff;
      border-color: #00c4ff;
    }

    .category-options label.btn {
      border: 1px solid #555;
      color: #ccc;
      margin-right: 10px;
      margin-bottom: 10px;
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
    <h3><img src="../assets/images/logo/logo.png" alt="Inventides"></h3>
    <a href="admin-dashboard.php"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
    <a href="admin-products.php" class="active"><i class="fa-solid fa-box me-2"></i>Manage Products</a>
    <a href="admin-users.php"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
    <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
    <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
  </div>

  <!-- Main content -->
  <div class="main">
    <div class="">
      <h2><i class="fa-solid fa-plus me-2"></i>Add New Product</h2>

      <form action="../routes/addproduct.php" method="POST" enctype="multipart/form-data">
        <div class="row g-4">

          <div class="col-md-6">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
          </div>

          <div class="col-md-6">
            <label>Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" placeholder="49.99" required>
          </div>

          <div class="col-md-6">
            <label>Old Price ($)</label>
            <input type="number" step="0.01" name="old_price" class="form-control" placeholder="Optional">
          </div>

          <!-- Categories -->
          <div class="col-12">
            <label>Category</label>
            <div class="category-options d-flex flex-wrap">
              <?php
              $categories = ['Electronics','Accessories','Vape Kits','Batteries','Juice','Pods'];
              foreach ($categories as $i => $cat) {
                $id = 'cat' . ($i + 1);
                echo "
                  <input type='checkbox' class='btn-check' id='$id' name='category[]' value='$cat'>
                  <label class='btn btn-outline-light' for='$id'>$cat</label>
                ";
              }
              ?>
            </div>
            <small class="text-primary">Select multiple if applicable.</small>
          </div>

          <!-- Tags -->
          <div class="col-12">
            <label>Tags</label>
            <div class="category-options d-flex flex-wrap">
              <?php
              $tags = ['New Arrival','Best Seller','Limited Edition','Trending','Discount','Restocked'];
              foreach ($tags as $i => $tag) {
                $id = 'tag' . ($i + 1);
                echo "
                  <input type='checkbox' class='btn-check' id='$id' name='tags[]' value='$tag'>
                  <label class='btn btn-outline-light' for='$id'>$tag</label>
                ";
              }
              ?>
            </div>
            <small class="text-primary">Select tags to improve search visibility.</small>
          </div>

          <!-- Main Images -->
          <div class="col-md-6">
            <label>Main Image (Front)</label>
            <input type="file" name="main_image_front" id="mainImageFront" class="form-control" accept="image/*" required>
            <div class="preview mt-3" id="mainImageFrontPreview"></div>
          </div>

          <div class="col-md-6">
            <label>Main Image (Back)</label>
            <input type="file" name="main_image_back" id="mainImageBack" class="form-control" accept="image/*" required>
            <div class="preview mt-3" id="mainImageBackPreview"></div>
          </div>

          <!-- Sub Images -->
          <?php
          for ($i = 1; $i <= 4; $i++) {
            echo "
              <div class='col-md-3'>
                <label>Sub Image $i</label>
                <input type='file' name='sub_image_$i' id='subImage$i' class='form-control' accept='image/*'>
                <div class='preview mt-2' id='subImagePreview$i'></div>
              </div>
            ";
          }
          ?>

          <div class="col-12">
            <label>Product Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Main product details..." required></textarea>
          </div>

          <div class="col-12">
            <label>Additional Description</label>
            <textarea name="additional_description" class="form-control" rows="4" placeholder="Additional features, packaging, or info..."></textarea>
          </div>

          <div class="col-12 text-center mt-4">
            <button type="submit" name="save_product" class="btn btn-primary me-3">
              <i class="fa-solid fa-floppy-disk me-2"></i>Save Product
            </button>
            <a href="admin-dashboard.php" class="btn btn-secondary">
              <i class="fa-solid fa-xmark me-2"></i>Cancel
            </a>
          </div>
        </div>
      </form>
    </div>

    <footer>
      &copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.
    </footer>
  </div>

  <!-- Preview Script -->
  <script>
    function previewImage(inputId, previewId) {
      const input = document.getElementById(inputId);
      const preview = document.getElementById(previewId);
      if (!input || !preview) return;

      input.addEventListener('change', function() {
        preview.innerHTML = '';
        const file = this.files[0];
        if (file) {
          const img = document.createElement('img');
          img.src = URL.createObjectURL(file);
          img.onload = () => URL.revokeObjectURL(img.src);
          preview.appendChild(img);
        }
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      previewImage('mainImageFront', 'mainImageFrontPreview');
      previewImage('mainImageBack', 'mainImageBackPreview');
      for (let i = 1; i <= 4; i++) previewImage('subImage' + i, 'subImagePreview' + i);
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
