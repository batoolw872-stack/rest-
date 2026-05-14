<?php
session_start();

// Step 1: Check if item ID is passed via URL
if (isset($_GET['id'])) {
    $removeId = $_GET['id'];

    // Step 2: Check if cart_items session is set
    if (isset($_SESSION['cart_items'])) {
        // Step 3: Loop through cart items and remove the matching one
        foreach ($_SESSION['cart_items'] as $key => $item) {
            if ($item['id'] == $removeId) {
                unset($_SESSION['cart_items'][$key]);
                break;
            }
        }

        // Step 4: Re-index the array
        $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
    }
}

// Step 5: Redirect back to cart
header("Location: cart.php");
exit();
