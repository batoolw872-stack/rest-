<?php
session_start();
require './config/config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query to check login
    $query = "SELECT * FROM login WHERE admin_email = '$email' AND admin_pass = '$pass'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);

        // Set session values
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['admin_name'];
        

        header('Location: ./../home.php');
        exit;
    } else {
        $_SESSION['req'] = array(
            'type' => 'danger',
            'message' => 'Your Email and Password are invalid'
        );

        header('Location: ./../index.php');
        exit;
    }
}
?>
