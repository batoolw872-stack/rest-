<?php
session_start();

// Increase qty
if (isset($_POST['increase'])) {
    $id = $_POST['increase'];
    foreach ($_SESSION['cart_items'] as &$item) {
        if ($item['id'] == $id) {
            $item['qty']++;
        }
    }
}

// Decrease qty
if (isset($_POST['decrease'])) {
    $id = $_POST['decrease'];
    foreach ($_SESSION['cart_items'] as &$item) {
        if ($item['id'] == $id && $item['qty'] > 1) {
            $item['qty']--;
        }
    }
}

header("Location: cart.php");
exit;
