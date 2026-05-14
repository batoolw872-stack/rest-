<?php
session_start();
require './config/config.php';

// ADD PRODUCT
if (isset($_POST['add'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $path = './../img/' . $image;

    move_uploaded_file($_FILES['image']['tmp_name'], $path);

        $query = "INSERT INTO product(cat_id,p_name,p_desc, p_price, p_img) 
                  VALUES('" . $category_id . "', '" . $name . "', '" . $desc . "', '" . $price . "','" . $image . "')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            $_SESSION['hi2'] = [
                'type' => 'success',
                'massage' => 'Product Added Successfully'
            ];
            header('location:./../product/add_product.php');
            exit;
        }
    }


// DELETE PRODUCT
if (isset($_GET['delete']) && $_GET['delete'] != "") {
    $id = $_GET['delete'];

    $query = "DELETE FROM product WHERE p_id='" . $id . "'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $_SESSION['dele2'] = array(
            'type' => 'danger',
            'massage' => 'Product Deleted Successfully'
        );
        header('location:./../product/view_product.php');
        exit;
    }
}



// UPDATE PRODUCT
if (isset($_POST['edit']) && isset($_GET['update_id']) && $_GET['update_id'] != "") {
    $category_id = $_POST['category_id'];
    $id = $_GET['update_id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];

    // ✅ Fetch old image from DB
    $get_old = mysqli_query($conn, "SELECT p_img FROM product WHERE p_id='$id'");
    $row_old = mysqli_fetch_assoc($get_old);
    $old_image = $row_old['p_img'];

    // ✅ Handle new image upload
    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "./../img/" . $image);

        // (Optional) Delete old image file if it exists
        if (!empty($old_image) && file_exists("./../img/" . $old_image)) {
            unlink("./../img/" . $old_image);
        }
    } else {
        $image = $old_image; // keep old one
    }

    // ✅ Update query
    $query = "UPDATE product 
              SET p_name='" . $name . "', 
                  p_price='" . $price . "', 
                  cat_id='" . $category_id . "', 
                  p_img='" . $image . "'
              WHERE p_id='" . $id . "'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $_SESSION['update2'] = [
            'type' => 'success',
            'message' => 'Product Updated Successfully'
        ];
        header('location:./../product/view_product.php');
        exit;
    }
}
?>
