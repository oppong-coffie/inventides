<?php
include('../dbcon.php');

if (isset($_POST['update_product'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']);
    $old_price = floatval($_POST['old_price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $additional_description = mysqli_real_escape_string($conn, $_POST['additional_description']);

    // Handle categories and tags
    $category = isset($_POST['category']) ? implode(',', $_POST['category']) : '';
    $tags = isset($_POST['tags']) ? implode(',', $_POST['tags']) : '';

    // Fetch existing data for reference
    $query = mysqli_query($conn, "SELECT * FROM items WHERE id = $id");
    if (!$query || mysqli_num_rows($query) == 0) {
        echo "<script>alert('Product not found!'); window.location='../admin/admin-products.php';</script>";
        exit();
    }
    $product = mysqli_fetch_assoc($query);

    // Directories
    $productDir = "../assets/images/product/";
    $shopDir = "../assets/images/shop/";

    // --- MAIN IMAGE (FRONT) ---
    $image_front = $product['image_front'];
    if (!empty($_FILES['main_image_front']['name'])) {
        $frontName = time() . "_front_" . basename($_FILES['main_image_front']['name']);
        $frontPath = $productDir . $frontName;
        move_uploaded_file($_FILES['main_image_front']['tmp_name'], $frontPath);
        $image_front = $frontName;
    }

    // --- MAIN IMAGE (BACK) ---
    $image_back = $product['image_back'];
    if (!empty($_FILES['main_image_back']['name'])) {
        $backName = time() . "_back_" . basename($_FILES['main_image_back']['name']);
        $backPath = $productDir . $backName;
        move_uploaded_file($_FILES['main_image_back']['tmp_name'], $backPath);
        $image_back = $backName;
    }

    // --- SUB IMAGES (JSON ARRAY) ---
    $existingSubImages = json_decode($product['shop_images'], true);
    if (!is_array($existingSubImages)) $existingSubImages = [];

    $newSubImages = [];
    for ($i = 0; $i < 4; $i++) {
        if (!empty($_FILES['sub_images']['name'][$i])) {
            $subName = time() . "_sub_" . $i . "_" . basename($_FILES['sub_images']['name'][$i]);
            $subPath = $shopDir . $subName;
            move_uploaded_file($_FILES['sub_images']['tmp_name'][$i], $subPath);
            $newSubImages[] = $subName;
        } else {
            // Keep old sub image if no new one uploaded
            if (isset($existingSubImages[$i])) {
                $newSubImages[] = $existingSubImages[$i];
            }
        }
    }

    $shop_images = json_encode($newSubImages, JSON_UNESCAPED_SLASHES);

    // --- UPDATE QUERY ---
    $updateSQL = "UPDATE items SET 
                    `name` = '$name',
                    `new_price` = '$price',
                    `old_price` = '$old_price',
                    `product_description` = '$description',
                    `description` = '$additional_description',
                    `category` = '$category',
                    `tags` = '$tags',
                    `image_front` = '$image_front',
                    `image_back` = '$image_back',
                    `shop_images` = '$shop_images'
                  WHERE id = $id";

    if (mysqli_query($conn, $updateSQL)) {
        echo "<script>
            alert('✅ Product updated successfully!');
            window.location='../admin/admin-products.php';
        </script>";
    } else {
        echo "<script>
            alert('❌ Error updating product: " . mysqli_error($conn) . "');
            window.location='../admin/admin-editproduct.php?id=$id';
        </script>";
    }
} else {
    echo "<script>alert('Invalid access.'); window.location='../admin/admin-products.php';</script>";
}
?>
