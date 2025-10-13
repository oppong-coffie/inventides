<?php
include('../dbcon.php');

// Ensure the ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid product ID!'); window.location='../admin/admin-products.php';</script>";
    exit();
}

$id = intval($_GET['id']);

// Fetch product data for image cleanup
$query = mysqli_query($conn, "SELECT image_front, image_back, shop_images FROM items WHERE id = $id");
if (!$query || mysqli_num_rows($query) == 0) {
    echo "<script>alert('Product not found!'); window.location='../admin/admin-products.php';</script>";
    exit();
}

$product = mysqli_fetch_assoc($query);

// --- Delete images from the server ---
$imageDir = '../assets/images/product/';

// Main images
if (!empty($product['image_front']) && file_exists($imageDir . $product['image_front'])) {
    unlink($imageDir . $product['image_front']);
}
if (!empty($product['image_back']) && file_exists($imageDir . $product['image_back'])) {
    unlink($imageDir . $product['image_back']);
}

// Sub images (JSON array)
if (!empty($product['shop_images'])) {
    $subImages = json_decode($product['shop_images'], true);
    if (is_array($subImages)) {
        foreach ($subImages as $img) {
            $path = $imageDir . $img;
            if (file_exists($path)) unlink($path);
        }
    }
}

// --- Delete product record from DB ---
$deleteQuery = mysqli_query($conn, "DELETE FROM items WHERE id = $id");

if ($deleteQuery) {
    echo "<script>alert('✅ Product deleted successfully!'); window.location='../admin/admin-products.php';</script>";
} else {
    echo "<script>alert('❌ Error deleting product: " . mysqli_error($conn) . "'); window.location='../admin/admin-products.php';</script>";
}
?>
