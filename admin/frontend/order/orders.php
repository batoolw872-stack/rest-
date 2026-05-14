<?php
session_start();
include './../include/sidebar.php';
include './../include/header.php';
require '../../backend/config/config.php';

// ---- Get filter input ----
$status_filter = $_GET['status'] ?? '';

// ---- Base query ----
$query = "SELECT * FROM orders WHERE 1=1";

// ---- Apply filter if selected ----
if ($status_filter == "pending") {
    // Pending = orders having items
    $query .= " AND id IN (SELECT order_id FROM order_items)";
} elseif ($status_filter == "completed") {
    // Completed = orders with no items left
    $query .= " AND id NOT IN (SELECT order_id FROM order_items)";
}

$query .= " ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<main class="main-content" style="margin-left:250px;padding:20px;">
  <div class="container-fluid">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h4 mb-0">📦 All Orders</h1>

        <!-- ✅ Filter Form -->
        <form method="GET" class="d-flex gap-2">
          <select name="status" class="form-select">
            <option value="">All</option>
            <option value="pending" <?= ($status_filter=="pending") ? "selected" : "" ?>>Pending</option>
            <option value="completed" <?= ($status_filter=="completed") ? "selected" : "" ?>>Completed</option>
          </select>
          <button type="submit" class="btn btn-primary">Filter</button>
          <a href="orders.php" class="btn btn-secondary">Reset</a>
        </form>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Payment Method</th>
              <th>Total Amount</th>
              <th>Items</th>
              <th>Status</th> 
            </tr>
          </thead>
          <tbody>
            <?php
            $sn = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              $order_id = $row['id'];

              // ✅ Check if order has items
              $check_items = mysqli_query($conn, "SELECT COUNT(*) AS item_count FROM order_items WHERE order_id = $order_id");
              $item_data = mysqli_fetch_assoc($check_items);
              $item_count = $item_data['item_count'];

              // ✅ Status logic
              if ($item_count > 0) {
                  $status_class = "btn btn-sm btn-danger";
                  $status_text = "Pending";
              } else {
                  $status_class = "btn btn-sm btn-success";
                  $status_text = "Completed";
              }
            ?>
            <tr>
              <td><?= $sn++ ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['address'] ?></td>
              <td><?= $row['payment_method'] ?></td>
              <td>Rs. <?= $row['total_amount'] ?></td>
              <td>
                <a href="order_items.php?order_id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                  <i class="fa fa-eye"></i> View Items
                </a>
              </td>
              <td>
                <span class="<?= $status_class ?>">
                  <?= $status_text ?>
                </span>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php
include './../include/footer.php';
?>

</main>
</body>
</html>
