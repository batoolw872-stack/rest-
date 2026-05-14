<?php
        session_start();



require '../../admin/backend/config/config.php';


if(isset($_POST['sign'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];




    $query="INSERT INTO users (full_name, email, pass)values('".$name."','".$email."','".$pass."')";
    $res=mysqli_query($conn, $query);



    if($res){
        header('location:menu.php');
    }


}



if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);

        // ✅ Start session and store user data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name']; // This will be shown in navbar

        header('Location: index.php');
    }
}



?>
