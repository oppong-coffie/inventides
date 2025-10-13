<?php
include('../dbcon.php');

if (isset($_POST['save_product'])) {
  $name = $_POST['name'];
  $categories = isset($_POST['category']) ? implode(',', $_POST['category']) : '';
  $tags = isset($_POST['tags']) ? implode(',', $_POST['tags']) : '';
  $price = $_POST['price'];
  $old_price = $_POST['old_price'];
  $description = $_POST['description'];
  $additional_description = $_POST['additional_description'];

  $uploadDir = "../assets/images/product/";
  $main_image_front = "";
  $main_image_back = "";
  $subImages = [];

  // Upload main front image
  if (!empty($_FILES['main_image_front']['name'])) {
    $main_image_front = basename($_FILES['main_image_front']['name']);
    move_uploaded_file($_FILES['main_image_front']['tmp_name'], $uploadDir . $main_image_front);
  }

  // Upload main back image
  if (!empty($_FILES['main_image_back']['name'])) {
    $main_image_back = basename($_FILES['main_image_back']['name']);
    move_uploaded_file($_FILES['main_image_back']['tmp_name'], $uploadDir . $main_image_back);
  }

  // Upload sub-images
  for ($i = 1; $i <= 4; $i++) {
    if (!empty($_FILES["sub_image_$i"]['name'])) {
      $filename = basename($_FILES["sub_image_$i"]['name']);
      move_uploaded_file($_FILES["sub_image_$i"]['tmp_name'], $uploadDir . $filename);
      $subImages[] = $filename;
    }
  }

  $shop_images = json_encode($subImages);

  $sql = "INSERT INTO items (`name`, `category`, `tags`, `new_price`, `old_price`, `product_description`, `description`, `image_front`, `image_back`, `shop_images`)
          VALUES ('$name', '$categories', '$tags', '$price', '$old_price', '$description', '$additional_description', '$main_image_front', '$main_image_back', '$shop_images')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('✅ Product added successfully!'); window.location.href='../    admin/dashboard.php';</script>";
  } else {
    echo "<script>alert('❌ Error: " . mysqli_error($conn) . "');</script>";
  }
}
?>
