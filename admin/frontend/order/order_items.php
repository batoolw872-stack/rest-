<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session and include dependencies
session_start();
include './../include/sidebar.php';
include './../include/header.php';
require '../../backend/config/config.php';

// Get and validate order ID from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
if (!$order_id) {
    die("<h2>❌ Invalid Order ID</h2>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order #<?= $order_id ?> Items</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<main class="main-content" style="margin-left:250px; padding:20px;">
  <div class="container-fluid">

    <a href="orders.php" class="btn btn-dark mb-3">
      <i class="fa fa-arrow-left me-1"></i>Back to Orders
    </a>

    <div class="card shadow-sm">
      <div class="card-header">
        <h5 class="mb-0">Items in Order #<?= $order_id ?></h5>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
              <th>Delete</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Fetch items for the order
            $sql = "SELECT * FROM order_items WHERE order_id = $order_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0):
              $count = 1;
              while ($row = mysqli_fetch_assoc($result)):
                $subtotal = $row['product_price'] * $row['quantity'];
            ?>
              <tr>
                <td><?= $count++ ?></td>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td>
                  <img src="../../<?= htmlspecialchars($row['product_image']) ?>" width="60" height="60" class="rounded">
                </td>
                <td>Rs <?= number_format($row['product_price']) ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>Rs <?= number_format($subtotal) ?></td>

                <!-- Delete Button -->
                <td>
                  <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $row['id'] ?>">
                    Delete
                  </button>
                </td>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Delete Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure you want to delete 
                          <b><?= htmlspecialchars($row['product_name']) ?></b>?
                        </p>
                      </div>
                      <div class="modal-footer">
                        <!-- Correct backend path -->
                        <a href="./delete_item.php?delete=<?= $row['id'] ?>&order_id=<?= $order_id ?>" 
                           class="btn btn-danger">
                          Yes, Delete
                        </a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Confirm Order Button -->
                <td>
                  <form method="POST" action="./../../backend/confrim_items.php" style="display:inline;">
                    <input type="hidden" name="item_id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-success btn-sm">
                      Confirm Order
                    </button>
                  </form>
                </td>
              </tr>
            <?php
              endwhile;
            else:
            ?>
              <tr>
                <td colspan="8" class="text-center text-danger">No items in pending, already completed</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

<?php include './../include/footer.php'; ?>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
