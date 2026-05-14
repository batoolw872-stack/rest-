<?php
require '../../backend/config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // ✅ Update order status to cancelled
    $sql = "UPDATE orders SET status = 'cancelled' WHERE id = $order_id";
    if (mysqli_query($conn, $sql)) {
        // redirect back to order_items
        header("Location: ./../order/order_items.php?order_id=$order_id");
        exit;
    } else {
        echo "❌ Failed to cancel order: " . mysqli_error($conn);
    }
} else {
    header("Location: ./../order/orders.php");
    exit;
}
?>
