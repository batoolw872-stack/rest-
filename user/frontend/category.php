<?php
include './header.php'; // include your existing header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
<!-- category section -->

<section class="category_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center mt-4">
      <h2>Food Categories</h2>
    </div>

    <div class="row mt-5">
      <?php
require '../../admin/backend/config/config.php';
$query = "SELECT * FROM cat";
$res = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($res)) {
?>
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="box" style="background-color: #e5e1e1ff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); transition: 0.3s;">
      <div class="text-center p-3">
        <a href="menu.php?cat=<?= $row['id'] ?>" style="text-decoration: none;">
          <div class="img-box" style="height: 150px; display: flex; align-items: center; justify-content: center;">
            <img src="./../admin/img/<?= $row['cat_img'] ?>" alt="<?= $row['cat_name'] ?>" style="max-height: 120px; max-width: 100%; border-radius: 10%;">
          </div>
        </a>
      </div>
      <div class="detail-box" style="background-color: #252525; color: white; padding: 20px; border-top-left-radius: 30px; border-top-right-radius: 30px;">
        <h5 style="color: white;"><?= $row['cat_name'] ?></h5>
        <p>Explore delicious items in the <?= $row['cat_name'] ?> category!</p>
      </div>
    </div>
  </div>
<?php } ?>

    </div>
  </div>
</section>

<?php
include './footer.php'; 
?>
</body>
</html>
