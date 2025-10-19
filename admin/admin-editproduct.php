<?php
include('../dbcon.php');

// Get product by ID
if (!isset($_GET['id'])) {
    echo "<script>alert('Product ID missing!'); window.location='admin-products.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$productQuery = mysqli_query($conn, "SELECT * FROM items WHERE id = $id");
if (mysqli_num_rows($productQuery) == 0) {
    echo "<script>alert('Product not found!'); window.location='admin-products.php';</script>";
    exit();
}

$product = mysqli_fetch_assoc($productQuery);

// Decode JSON fields if used
$shop_images = json_decode($product['shop_images'], true);
if (!is_array($shop_images)) $shop_images = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product | Inventides Admin</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .image-wrapper img {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .image-wrapper:hover img {
            transform: scale(1.05);
            box-shadow: 0 0 10px #00c4ff66;
        }

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

        .container {
            background-color: #111133;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #00c4ff;
            font-weight: 600;
        }

        label {
            color: #ccc;
            font-weight: 500;
            margin-top: 10px;
        }

        .form-control,
        textarea {
            background-color: #0a0a23;
            color: #fff;
            border: 1px solid #333;
            border-radius: 8px;
        }

        .form-control:focus,
        textarea:focus {
            border-color: #00c4ff;
            box-shadow: none;
        }

        .preview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin: 5px;
            border: 1px solid #333;
        }

        .btn-primary {
            background: linear-gradient(90deg, #007bff, #00c4ff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #0089d6);
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #aaa;
        }

        .category-options .btn-check:checked+.btn {
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

        .category-options label.btn:hover {
            background-color: #1a1a3d;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3><img src="../assets/images/logo/logo.png" alt="Inventides" width="140"></h3>
        <a href="admin-dashboard.php"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
        <a href="admin-products.php" class="active"><i class="fa-solid fa-box me-2"></i>Manage Products</a>
        <a href="admin-users.php"><i class="fa-solid fa-users me-2"></i>Manage Users</a>
        <a href="admin-orders.php"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Orders</a>
        <a href="../routes/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h2><i class="fa-solid fa-pen-to-square me-2"></i>Edit Product</h2>
            <hr class="border-secondary mb-4">

            <form action="../routes/updateproduct.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                <div class="row g-4">
                    <div class="col-md-6">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label>Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $product['new_price']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label>Old Price ($)</label>
                        <input type="number" step="0.01" name="old_price" class="form-control" value="<?php echo $product['old_price']; ?>">
                    </div>

                    <!-- Category Checkboxes -->
                    <div class="col-12">
                        <label>Category</label>
                        <div class="category-options d-flex flex-wrap">
                            <?php
                            $allCats = ['Electronics', 'Accessories', 'Vape Kits', 'Batteries', 'Juice', 'Pods'];
                            $selectedCats = explode(',', $product['category']);
                            foreach ($allCats as $cat) {
                                $checked = in_array($cat, $selectedCats) ? 'checked' : '';
                                echo "
                  <input type='checkbox' class='btn-check' id='cat_$cat' name='category[]' value='$cat' $checked>
                  <label class='btn btn-outline-light' for='cat_$cat'>$cat</label>
                ";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="col-12">
                        <label>Tags</label>
                        <div class="category-options d-flex flex-wrap">
                            <?php
                            $allTags = ['New Arrival', 'Featured', 'Top Rated', 'Trending', 'Discount', 'Restocked'];
                            $selectedTags = explode(',', $product['tags']);
                            foreach ($allTags as $tag) {
                                $checked = in_array($tag, $selectedTags) ? 'checked' : '';
                                echo "
                  <input type='checkbox' class='btn-check' id='tag_$tag' name='tags[]' value='$tag' $checked>
                  <label class='btn btn-outline-light' for='tag_$tag'>$tag</label>
                ";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Main Images -->
                    <div class="col-md-6">
                        <label>Main Image (Front)</label>
                        <input type="file" name="main_image_front" id="mainImageFront" class="form-control" accept="image/*">
                        <div class="preview mt-2">
                            <img src="../assets/images/product/<?php echo htmlspecialchars($product['image_front']); ?>" alt="Front">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Main Image (Back)</label>
                        <input type="file" name="main_image_back" id="mainImageBack" class="form-control" accept="image/*">
                        <div class="preview mt-2">
                            <img src="../assets/images/product/<?php echo htmlspecialchars($product['image_back']); ?>" alt="Back">
                        </div>
                    </div>

                    <!-- Sub Images -->
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="col-md-3">
                            <label>Sub Image <?php echo $i + 1; ?></label>
                            <input type="file" name="sub_images[]" id="subImage<?php echo $i; ?>" class="form-control" accept="image/*">
                            <div class="preview mt-2">
                                <?php if (isset($shop_images[$i])): ?>
                                    <img src="../assets/images/product/<?php echo htmlspecialchars($shop_images[$i]); ?>" alt="Sub <?php echo $i + 1; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <!-- Description -->
                    <div class="col-12">
                        <label>Product Description</label>
                        <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($product['product_description']); ?></textarea>
                    </div>

                    <div class="col-12">
                        <label>Additional Description</label>
                        <textarea name="additional_description" class="form-control" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" name="update_product" class="btn btn-primary me-2">
                            <i class="fa-solid fa-floppy-disk me-2"></i>Update Product
                        </button>
                        <a href="admin-products.php" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <footer>&copy; <?php echo date("Y"); ?> Inventides Admin Panel — All Rights Reserved.</footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Reusable preview function
            function previewImage(inputId) {
                const input = document.getElementById(inputId);
                if (!input) return;

                input.addEventListener("change", () => {
                    const preview = input.closest(".col-md-3, .col-md-6").querySelector(".preview");

                    // Preserve existing old images
                    const oldImages = Array.from(preview.querySelectorAll("div[data-old='true']"));
                    preview.innerHTML = "";
                    oldImages.forEach(old => preview.appendChild(old));

                    // Add new preview(s)
                    Array.from(input.files).forEach(file => {
                        const wrapper = document.createElement("div");
                        wrapper.className = "image-wrapper text-center d-inline-block";
                        wrapper.style.margin = "5px";

                        const img = document.createElement("img");
                        img.src = URL.createObjectURL(file);
                        img.onload = () => URL.revokeObjectURL(img.src);
                        img.style.width = "100px";
                        img.style.height = "100px";
                        img.style.borderRadius = "8px";
                        img.style.objectFit = "cover";
                        img.style.border = "2px solid #00c4ff";

                        const label = document.createElement("small");
                        label.textContent = "(New)";
                        label.style.color = "#00c4ff";
                        label.style.display = "block";
                        label.style.marginTop = "4px";

                        wrapper.appendChild(img);
                        wrapper.appendChild(label);
                        preview.appendChild(wrapper);
                    });
                });
            }

            // Label and mark old images
            document.querySelectorAll(".preview img").forEach(img => {
                const wrapper = document.createElement("div");
                wrapper.className = "image-wrapper text-center d-inline-block";
                wrapper.dataset.old = "true";
                wrapper.style.margin = "5px";

                const label = document.createElement("small");
                label.textContent = "(Old)";
                label.style.color = "#aaa";
                label.style.display = "block";
                label.style.marginTop = "4px";

                img.parentNode.insertBefore(wrapper, img);
                wrapper.appendChild(img);
                wrapper.appendChild(label);
            });

            // Apply preview behavior
            previewImage("mainImageFront");
            previewImage("mainImageBack");
            for (let i = 0; i < 4; i++) previewImage(`subImage${i}`);
        });
    </script>


</body>

</html>