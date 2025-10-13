<?php
include('../dbcon.php');

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$tag = isset($_GET['tag']) ? $_GET['tag'] : '';

$sql = "SELECT * FROM items WHERE 1";

if (!empty($search)) {
    $sql .= " AND name LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
}
if (!empty($category)) {
    $sql .= " AND category LIKE '%" . mysqli_real_escape_string($conn, $category) . "%'";
}
if (!empty($tag)) {
    $sql .= " AND tags LIKE '%" . mysqli_real_escape_string($conn, $tag) . "%'";
}

$sql .= " ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-hover align-middle">';
echo '<thead>
        <tr>
          <th>Thumbnail</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Tags</th>
          <th>Price</th>
          <th>Old Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $frontImage = htmlspecialchars($row['image_front']);
        echo "<tr>
          <td><img src='../assets/images/product/$frontImage' alt='product'></td>
          <td>{$row['name']}</td>
          <td>{$row['category']}</td>
          <td>{$row['tags']}</td>
          <td>$" . number_format($row['new_price'], 2) . "</td>
          <td>$" . number_format($row['old_price'], 2) . "</td>
          <td>
            <a href='admin-editproduct.php?id={$row['id']}' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-pen'></i></a>
            <a href='../routes/deleteproduct.php?id={$row['id']}' class='btn btn-sm btn-danger mt-1' onclick='return confirm(\"Delete this product?\")'><i class='fa-solid fa-trash'></i></a>
          </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center text-muted py-4'>No products found</td></tr>";
}
echo '</tbody></table></div>';
