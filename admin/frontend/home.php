<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // login page ka path
    exit();
}
include "./include/header.php";
include "./include/sidebar.php";
require '../backend/config/config.php';



?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
          <!-- Navbar Header -->
          

          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <!-- <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
              </div> -->
              <!-- <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
              </div> -->
            </div>
            <div class="row">
              <?php
include '../backend/config/config.php'; // DB connection

// Count total orders (unique order IDs)
// Pending orders
$sql_pending = "SELECT COUNT(DISTINCT order_id) AS pending FROM order_items";
$result_pending = mysqli_query($conn, $sql_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$pending = $row_pending['pending'] ?? 0;

// Confirmed orders
$sql_confirmed = "SELECT COUNT(*) AS confirmed FROM sales";
$result_confirmed = mysqli_query($conn, $sql_confirmed);
$row_confirmed = mysqli_fetch_assoc($result_confirmed);
$confirmed = $row_confirmed['confirmed'] ?? 0;

// Total orders
$total_orders = $pending + $confirmed;

?>

              <div class="col-sm-6 col-md-3">
  <div class="card card-stats card-round">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-icon">
          <div class="icon-big text-center icon-primary bubble-shadow-small">
            <i class="fas fa-shopping-cart"></i>
          </div>
        </div>
        <div class="col col-stats ms-3 ms-sm-0">
          <div class="numbers">
            <p class="card-category">Total Orders</p>
            <h4 class="card-title"><?= $total_orders ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

include '../backend/config/config.php'; // DB connection

// Pending orders ka count (unique order_id)
$sql_pending = "SELECT COUNT(DISTINCT order_id) AS pending_orders FROM order_items";
$result_pending = mysqli_query($conn, $sql_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$pending_orders = $row_pending['pending_orders'] ?? 0;
?>

<div class="col-sm-6 col-md-3">
  <div class="card card-stats card-round">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-icon">
          <div class="icon-big text-center icon-info bubble-shadow-small">
            <i class="fas fa-user-check"></i>
          </div>
        </div>
        <div class="col col-stats ms-3 ms-sm-0">
          <div class="numbers">
            <p class="card-category">Pending Orders</p>
            <h4 class="card-title"><?= $pending_orders ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

              <?php

include '../backend/config/config.php'; // DB connection

// Total sales ka sum nikalna
$sql_sales = "SELECT SUM(subtotal) AS total_sales FROM sales";
$result_sales = mysqli_query($conn, $sql_sales);
$row_sales = mysqli_fetch_assoc($result_sales);
$total_sales = $row_sales['total_sales'] ?? 0;

?>

              <div class="col-sm-6 col-md-3">
  <div class="card card-stats card-round">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-icon">
          <div class="icon-big text-center icon-success bubble-shadow-small">
            <i class="fas fa-luggage-cart"></i>
          </div>
        </div>
        <div class="col col-stats ms-3 ms-sm-0">
          <div class="numbers">
            <p class="card-category">Sales</p>
            <h4 class="card-title">Rs <?= number_format($total_sales, 2) ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Order</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-8">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">User Statistics</div>
                      <div class="card-tools">
                        <a
                          href="#"
                          class="btn btn-label-success btn-round btn-sm me-2"
                        >
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                          Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                          Print
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                      <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
                     -->

      <!-- Custom template | don't include it in your project! -->
      <!-- <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div> -->
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    
<?php

include "./include/footer.php";

?>
