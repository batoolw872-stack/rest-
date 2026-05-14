
<?php
include './header.php';

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Feane </title>

  
     <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
      </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <!-- <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li>
      </ul> -->
<section class="category_section layout_padding-bottom">
  <div class="container">
    

    <div class="row mt-5">
      <?php
require '../../admin/backend/config/config.php';

$cat_name = "";
if (isset($_GET['cat'])) {
    $cat_id = intval($_GET['cat']);

    // Get category name for title
    $cat_q = mysqli_query($conn, "SELECT * FROM cat WHERE id = $cat_id");
    if ($cat_q && mysqli_num_rows($cat_q) > 0) {
        $cat_row = mysqli_fetch_assoc($cat_q);
        $cat_name = $cat_row['cat_name'];
    }

    // Products in selected category
    $query = "SELECT * FROM product WHERE cat_id = $cat_id";
} else {
    // Show all products
    $query = "SELECT * FROM product";
}

$res = mysqli_query($conn, $query);
?>





<div class="container mt-5">
  <h2 class="text-center mb-4"><?= $cat_name ? $cat_name . ' PRODUCTS' : 'All Products' ?></h2>

  <div class="row">
    <?php
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
    ?>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="box" style="background-color: #e5e1e1ff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); transition: 0.3s;">
          <div class="text-center p-3">
            <div class="img-box" style="height: 150px; display: flex; align-items: center; justify-content: center;">
              <img src="./../admin/img/<?= $row['p_img'] ?>" alt="<?= $row['p_name'] ?>" style="max-height: 120px; max-width: 100%; border-radius: 10%;">
            </div>
          </div>
          <div class="detail-box" style="background-color: #252525; color: white; padding: 20px; border-top-left-radius: 30px; border-top-right-radius: 30px;">
            <h5><?= $row['p_name'] ?></h5>
            <p>Fresh and tasty — enjoy our special <?= $row['p_name'] ?>!</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <span class="text-warning fw-semibold">Rs <?= $row['p_price'] ?></span>
              <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-sm btn-warning rounded-pill text-dark fw-semibold">
                <i class="fas fa-cart-plus me-1"></i> Add
              </a> -->

              <?php if (isset($_SESSION['user_id'])): ?>

  <form method="POST" action="./cart/add_to_cart.php">
    <input type="hidden" name="product_id" value="<?= $row['p_id'] ?>">
    <input type="hidden" name="product_name" value="<?= $row['p_name'] ?>">
    <input type="hidden" name="product_price" value="<?= $row['p_price'] ?>">
    <input type="hidden" name="product_img" value="<?= $row['p_img'] ?>">
    
    <button type="submit" class="btn btn-sm btn-warning rounded-pill text-dark fw-semibold">
      <i class="fas fa-cart-plus me-1"></i> Add
    </button>
  </form>
<?php else: ?>
  <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-sm btn-warning rounded-pill text-dark fw-semibold">
    <i class="fas fa-cart-plus me-1"></i> Add
  </a>
<?php endif; ?>


            </div>
          </div>
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../backend/signup.php" method="post">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control bg-black text-white border-white" id="loginEmail" placeholder="Enter email">
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control bg-black text-white border-white" id="loginPassword" placeholder="Password">
          </div>
          <input type="submit" name="login" class="btn btn-light w-100" value="Login">
        </form>
        <div class="text-center mt-3">
          <small>Don't have an account? <a href="#" class="text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign Up</a></small>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- SIGNUP MODAL -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../backend/signup.php" method="POST">
          <div class="mb-3">
            <label for="signupName" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control bg-black text-white border-white" id="signupName" placeholder="Your name" required>
          </div>
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control bg-black text-white border-white" id="signupEmail" placeholder="Enter email" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control bg-black text-white border-white" id="signupPassword" placeholder="Password" required>
          </div>
          <input type="submit" name="sign" class="btn btn-light w-100" value="Create Account">
        </form>
        <div class="text-center mt-3">
          <small>Already have an account? <a href="#" class="text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></small>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
      }
    } else {
      echo "<p class='text-center'>No products found.</p>";
    }
    ?>
  </div>
</div>



    </div>
  </div>
</section>


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
<?php

include './footer.php';




?>


</body>

</html>
