<?php
session_start();
require '../../../admin/backend/config/config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment_method'];

    // Calculate total from cart
    $total = 0;
    if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
        foreach ($_SESSION['cart_items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
    }

    // Add shipping cost
    $total += 250;

    // Insert into orders table
    $sql = "INSERT INTO orders (name, phone, address, payment_method, total_amount)
            VALUES ('$name', '$phone', '$address', '$payment', '$total')";

    if (mysqli_query($conn, $sql)) {
        $order_id = mysqli_insert_id($conn); // Get the inserted order ID

        // Insert all cart items into order_items
        foreach ($_SESSION['cart_items'] as $item) {
            $product_name = $item['name'];
            $product_price = $item['price'];
            $quantity = $item['qty'];
            $product_image = $item['image'];
            


            $item_sql = "INSERT INTO order_items (order_id, product_name, product_price, quantity, product_image)
                         VALUES ('$order_id', '$product_name', '$product_price', '$quantity', '$product_image')";
            mysqli_query($conn, $item_sql);
        }

        // Clear the cart
        unset($_SESSION['cart_items']);

        // Show confirmation page
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Order Confirmation</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background-color: #f8f9fa;
                    font-family: 'Helvetica Neue', sans-serif;
                }
                .confirmation-box {
                    max-width: 600px;
                    margin: 80px auto;
                    background: #fff;
                    border-radius: 12px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.05);
                    padding: 40px;
                    text-align: center;
                }
                .confirmation-box .icon {
                    font-size: 50px;
                    color: #28a745;
                }
                .confirmation-box h2 {
                    font-weight: bold;
                    margin-top: 20px;
                    color: #333;
                }
                .confirmation-box p {
                    font-size: 1rem;
                    color: #555;
                }
                .confirmation-box .btn {
                    margin-top: 20px;
                    padding: 10px 30px;
                }
            </style>
        </head>
        <body>

        <div class="confirmation-box">
            <div class="icon">✅</div>
            <h2>Order Placed Successfully!</h2>
            <p>Thank you, <strong><?= htmlspecialchars($name) ?></strong>.</p>
            <p>Your order ID is <strong>#<?= $order_id ?></strong>.</p>
            <p>We will contact you soon at <strong><?= htmlspecialchars($phone) ?></strong>.</p>
            <a href="../menu.php" class="btn btn-dark">← Back to Menu</a>
        </div>

        </body>
        </html>
        <?php
        exit;
    } else {
        // Insertion failed
        echo "<div class='container mt-5'><div class='alert alert-danger'>";
        echo "❌ Order failed: " . mysqli_error($conn);
        echo "</div></div>";
    }
} else {
    // Direct access to the file (no POST)
    header('Location: ../menu.php');
    exit;
}
?>
