<?php
include './config/config.php'; // apna DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $item_id = intval($_POST['item_id']);

    // 1. Pehle order item ka data le aate hain
    $sql = "SELECT * FROM order_items WHERE id = $item_id";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $product_name  = mysqli_real_escape_string($conn, $row['product_name']);
        $product_image = mysqli_real_escape_string($conn, $row['product_image']);
        $product_price = $row['product_price'];
        $quantity      = $row['quantity'];
        $subtotal      = $product_price * $quantity;

        // 2. Sales table me insert karein
        $insert_sql = "INSERT INTO sales (product_name, product_image, product_price, quantity, subtotal) 
                       VALUES ('$product_name', '$product_image', '$product_price', '$quantity', '$subtotal')";
        mysqli_query($conn, $insert_sql);

        // 3. order_items table se delete karein
        $delete_sql = "DELETE FROM order_items WHERE id = $item_id";
        mysqli_query($conn, $delete_sql);
    }
}

// Wapas orders page pe bhej dein
header("Location: /rest/admin/order/orders.php");
exit();
?>
