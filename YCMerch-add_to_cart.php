<?php
// YCMerch-add_to_cart.php: Adds product to cart and redirects to cart summary (PDO version)
require_once __DIR__ . '/YCdb_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
  $size = isset($_POST['size']) ? trim($_POST['size']) : '';
  $color = isset($_POST['color']) ? trim($_POST['color']) : '';
  $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
  $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.00;

  // Determine product type and name
  $product_type = '';
  $product_name = '';
  $found = false;
  $tables = ['tshirts', 'hoodies'];
  foreach ($tables as $table) {
    $stmt = $pdo->prepare("SELECT name FROM $table WHERE id = ? LIMIT 1");
    $stmt->execute([$product_id]);
    $row = $stmt->fetch();
    if ($row) {
      $product_name = $row['name'];
      $product_type = $table;
      $found = true;
      break;
    }
  }
  if (!$found) {
    die("Product not found.");
  }

  if (empty($size) || empty($color)) {
    echo '<div style="color:red; font-weight:bold; text-align:center; margin-top:30px;">Please select both size and color. <a href="javascript:history.back()">Go Back</a></div>';
    exit;
  }

  $total_cost = $price * $quantity;
  $stmt = $pdo->prepare("INSERT INTO cart (product_id, product_name, size, color, quantity, price, total_cost) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([$product_id, $product_name, $size, $color, $quantity, $price, $total_cost]);

  // Redirect to cart summary page
  header("Location: YCMerch-cart.php?added=1");
  exit;
} else {
  die("Invalid request method.");
}
?>
