<?php
session_start();
require '../../backend/config/config.php';

if (isset($_GET['delete']) && isset($_GET['order_id'])) {
    $item_id  = intval($_GET['delete']);
    $order_id = intval($_GET['order_id']);

    // Delete only this order item
    $query1 = "DELETE FROM order_items WHERE id = $item_id";
    mysqli_query($conn, $query1);

    // Redirect back to the same order page
    header("Location: order_items.php?order_id=" . $order_id);
    exit();
}
die("Invalid request");
