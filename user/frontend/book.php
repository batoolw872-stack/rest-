<?php
// session_start();
include './header.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Book a Table - Feane</title>

  <!-- Bootstrap and Styles -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
  </div>

  <!-- Book Section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Book A Table</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="../backend/book_table.php" method="POST">
              <div>
                <input type="text" name="name" class="form-control" placeholder="Your Name" required />
              </div>
              <div>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Your Email" required />
              </div>
              <div>
                <input type="text" name="persons" class="form-control" placeholder="How many persons?" required />
                <!-- <select name="persons" class="form-control" required>
                  <option value="" disabled selected>How many persons?</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select> -->
              </div>
              <div>
                <input type="date" name="booking_date" class="form-control" required>
              </div>
              <div class="btn_box">
                <button type="submit">Book Now</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div id="googleMap" style="width:100%;height:300px;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JS Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>

<?php include './footer.php'; ?>
</body>
</html>
