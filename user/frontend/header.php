<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feane Restaurant</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


  <style>
.cart-icon {
    position: relative;
    display: inline-block;
}

.cart-count {
    position: absolute;
    top: -5px;       /* thoda upar */
    right: -5px;     /* thoda right */
    background: red;
    color: white;
    font-size: 9px;  /* chhoti writing */
    padding: 1px 4px; /* chhota round */
    border-radius: 50%;
    font-weight: bold;
    min-width: 14px; /* shape round banane ke liye */
    text-align: center;
}
</style>

</head>
<body>

<!-- header section starts -->
<header class="header_section" style="background-color: black;">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand text-white fw-bold" href="index.php">
        <span>Feane</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./book.php">Book Table</a>
          </li>
        </ul>
<div class="d-flex align-items-center">
          <?php if (isset($_SESSION['user_name'])): ?>
            <span class="text-white me-3">
              👤 Welcome, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
            </span>
            <a href="../backend/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
          <?php else: ?>
            <!-- <a href="menu.php" class="btn btn-warning btn-sm text-dark fw-semibold" data-bs-toggle="modal" data-bs-target="#loginModal">
              <i class="fas fa-sign-in-alt me-1"></i> Login
            </a> -->
          <?php endif; ?>
        </div>
            <div class="user_option">
              <a href="./cart/cart.php" >
                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                 <div class="cart-icon">
    <i class="fa-solid fa-cart-shopping" style="color: #fcfcfc;"></i>
    <span class="cart-count">
        <?php echo isset($_SESSION['cart_items']) ? count($_SESSION['cart_items']) : 0; ?>
    </span>
</div>
              </a>
            </div>


      </div>
    </nav>
  </div>
</header>
<!-- end header section -->

<!-- Bootstrap JS for collapse toggle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
