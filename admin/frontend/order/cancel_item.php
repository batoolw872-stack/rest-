<?php
require '../../backend/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $item_id = intval($_POST['item_id']);
    $order_id = intval($_POST['order_id']);

    // Cancel ka status set karna
    $sql = "UPDATE order_items SET status = 'cancelled' WHERE id = $item_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../order/order_items.php?order_id=" . $order_id);
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "❌ Invalid Request";
}
?>
