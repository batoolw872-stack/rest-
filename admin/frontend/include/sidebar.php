  


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>FeaneAdmin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="/rest/admin/assets/img/favicon.png"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="/rest/admin/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["/rest/admin/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/rest/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/rest/admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="/rest/admin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/rest/admin/assets/css/demo.css" />


   <style>
.menu-count {
    background: red;
    color: white;
    font-size: 10px;
    padding: 1px 5px;
    border-radius: 50%;
    margin-left: 5px;
}

</style>


  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="white">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="white">
            <a href="index.php" class="logo">
              <img
               src="/rest/admin/assets/img/favicon.png"
                alt="navbar brand"
                class="navbar-brand"
                height="30"
              />
              <h5>FeaneAdmin</h5>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/rest/admin/home.php">
                        <span class="sub-item">Dashboard </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <!-- category -->
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Category</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/rest/admin/category/add_cat.php">
                        <span class="sub-item">Add Category</span>
                      </a>
                    </li>
                    <li>
                      <a href="/rest/admin/category/view_cat.php">
                        <span class="sub-item">View Category</span>
                      </a>
                    </li>
                    <li>
                  </ul>
                </div>
              </li>
              <!-- product -->
               <li class="nav-item">
                <a data-bs-toggle="collapse" href="#basepro">
                  <i class="fas fa-layer-group"></i>
                  <p>Product</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="basepro">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/rest/admin/product/add_product.php">
                        <span class="sub-item">Add Product</span>
                      </a>
                    </li>
                    <li>
                      <a href="/rest/admin/product/view_product.php">
                        <span class="sub-item">View Product</span>
                      </a>
                    </li>
                    <li>
                  </ul>
                </div>
              </li>

               <!-- order -->
               <li class="nav-item">
  <a data-bs-toggle="collapse" href="#basicprob" role="button" aria-expanded="false" aria-controls="basicpro">
    <i class="fas fa-layer-group"></i>
    <p>Orders</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="basicprob">
    <ul class="nav nav-collapse">
      <li>
        <a href="/rest/admin/order/orders.php">
          <span class="sub-item">Order Details</span>
        </a>
      </li>

      <!-- <li>
        <a href="/rest/admin/order/order_items.php">
          <span class="sub-item">Order Items</span>
        </a>
      </li> -->
    </ul>
  </div>
</li>



<!-- table -->
 <li class="nav-item">
  <a data-bs-toggle="collapse" href="#basicpromax" role="button" aria-expanded="false" aria-controls="basicpro">
    <i class="fas fa-layer-group"></i>
    <p>Bookings</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="basicpromax">
    <ul class="nav nav-collapse">
      <li>
        <a href="/rest/admin/view_bookings.php">
          <span class="sub-item">Table Booking</span>
        </a>
      </li>
    </ul>
  </div>
</li>

<!--  sells  -->
<li class="nav-item">
  <a data-bs-toggle="collapse" href="#basicpromaxbb" role="button" aria-expanded="false" aria-controls="basicpro">
    <i class="fas fa-layer-group"></i>
    <p>Sells</p>
    <span class="caret"></span>
  </a>
  <div class="collapse" id="basicpromaxbb">
    <ul class="nav nav-collapse">
      <li>
        <a href="/rest/admin/sells/view_Sell.php">
          <span class="sub-item">View Sells</span>
        </a>
      </li>
      <!-- <li>
        <a href="/rest/admin/order/order_items.php">
          <span class="sub-item">Order Items</span>
        </a>
      </li> -->
    </ul>
  </div>
</li>
              <!-- <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <i class="far fa-chart-bar"></i>
                  <p>Charts</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="charts/charts.html">
                        <span class="sub-item">Chart Js</span>
                      </a>
                    </li>
                    <li>
                      <a href="charts/sparkline.html">
                        <span class="sub-item">Sparkline</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
