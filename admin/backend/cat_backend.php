<?php


session_start();

require './config/config.php';

// add
if(isset($_POST['add'])){
    $name= $_POST['name'];
    $image= $_FILES['imag']['name'];
    $path= './../img/'.$image;
    move_uploaded_file($_FILES['imag']['tmp_name'], $path);

    $dup_query= "select * from cat where cat_name='".$name."'";
    $res_dup=mysqli_query($conn, $dup_query);

    if($row=mysqli_num_rows($res_dup)){
    $_SESSION['duplicate']=array(
        'type' => 'danger',
        'massage' => 'Duplicate Entry Not Allowed'
    );

    header('location:./../category/add_cat.php');
}

else{
$query= 'insert into cat(cat_name, cat_img) values("'.$name.'", "'.$image.'")';

$res=mysqli_query($conn, $query);

if($res){
 $_SESSION['ad']=array(
        'type' => 'danger',
        'massage' => 'Record Added successfully'
    );

    header('location:./../category/add_cat.php');
}

}
}

//delete
if(isset($_GET['delete']) && $_GET['delete']!=""){
    $id=$_GET['delete'];

    // 🔹 Pehle check karo agar product linked hai to
    $check = mysqli_query($conn, "SELECT COUNT(*) AS total FROM product WHERE cat_id='$id'");
    $row = mysqli_fetch_assoc($check);

    if($row['total'] > 0){
        $_SESSION['delete']=array(
            'type' => 'warning',
            'message' => '❌ Cannot delete! This category has products linked.'
        );
        header('location:./../category/view_cat.php');
        exit();
    }

    $query="delete from cat where id='".$id."'";
    $res=mysqli_query($conn, $query);
    if($res){
        $_SESSION['delete']=array(
            'type' => 'danger',
            'message' => 'Recoard Deleted Successfully'
        );
        header('location:./../category/view_cat.php');
    }
}





// update
if (isset($_POST['edit']) && isset($_GET['update']) && $_GET['update'] != "") {
    $id = $_GET['update'];
    $name = $_POST['name'];

    // ✅ Fetch old image from DB
    $get_old = mysqli_query($conn, "SELECT cat_img FROM cat WHERE id='$id'");
    $row_old = mysqli_fetch_assoc($get_old);
    $old_image = $row_old['cat_img'];

    // ✅ Check if new image uploaded
    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "./../img/" . $image);
    } else {
        $image = $old_image; // use old one
    }

    $query = "UPDATE cat SET cat_name='" . $name . "', cat_img='" . $image . "' WHERE id='" . $id . "'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $_SESSION['update'] = array(
            'type' => 'success',
            'message' => 'Record updated successfully'
        );
        header('location:./../category/view_cat.php');
        exit;
    }
}











?>
