<?php
session_start();
include "./../include/sidebar.php";
include "./../include/header.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>




<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card shadow">

      
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0" style="font-weight: 600;">Add Category</h3>
        <a href="./view_cat.php" class="btn btn-dark">
          <i class="fa-solid fa-cart-shopping" style="color: #f5cf0f;"></i> View Category

        </a>
      </div>
        
        <div class="card-body">
          
            
<?php

if(isset($_SESSION['ad'])){
    echo '<div class="alert alert-'.$_SESSION['ad']['type'].'">'.$_SESSION['ad']['massage'].'</div>';
    unset($_SESSION['ad']);
}

if(isset($_SESSION['duplicate'])){
    echo '<div class="alert alert-'.$_SESSION['duplicate']['type'].'">'.$_SESSION['duplicate']['massage'].'</div>';
    unset($_SESSION['duplicate']);
}

?>
          <form action="./../../backend/cat_backend.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="col-6">
                <label for="imag" class="form-label">Image</label>
                <input type="file" name="imag" class="form-control">
              </div>
            </div>

            <div class="card-footer">
            <input type="submit" name="add" value="Add" class="btn btn-dark w-50 d-block mx-auto mt-4">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





</div>
</form>




</body>
</html>



<?php

include "./../include/sidebar.php";


?>
