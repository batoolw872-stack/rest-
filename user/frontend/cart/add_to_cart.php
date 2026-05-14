<?php
session_start();
require '../../../admin/backend/config/config.php'; // Adjust path if needed

// Create cart array if not already set
if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}

// Get data from form
$id = $_POST['product_id'];
$name = $_POST['product_name'];
$price = $_POST['product_price'];
$image = 'admin/img/' . $_POST['product_img'];  // if only file name is posted

// ✅ Check if item already exists in the cart
$found = false;
foreach ($_SESSION['cart_items'] as &$item) {
    if ($item['id'] == $id) {
        // ✅ If exists, just increase quantity
        if (isset($item['qty'])) {
            $item['qty'] += 1;
        } 
        $found = true;
        break;
    }
}
unset($item); // Break reference

// ✅ If not found, add as new item with qty = 1
if (!$found) {
    $_SESSION['cart_items'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'qty' => 1
    ];
}

// Redirect back to menu
header("Location: ./cart.php");
exit();
