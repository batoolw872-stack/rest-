<?php
include './../include/sidebar.php';
include './../include/header.php';   
require '../../backend/config/config.php';

// ---- Get filter inputs ----
$from_date = $_GET['from_date'] ?? '';
$to_date = $_GET['to_date'] ?? '';

// ---- Base query ----
$sql = "SELECT * FROM sales WHERE 1=1";

// ---- Add filters if set ----
if (!empty($from_date)) {
    $sql .= " AND DATE(created_at) >= '" . mysqli_real_escape_string($conn, $from_date) . "'";
}

if (!empty($to_date)) {
    $sql .= " AND DATE(created_at) <= '" . mysqli_real_escape_string($conn, $to_date) . "'";
}

$sql .= " ORDER BY id DESC";

// ---- Run query ----
$result = mysqli_query($conn, $sql);

// ---- Calculate total sales ----
$total_sales = 0;
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        $total_sales += $row['subtotal'];
    }
}

// Re-run for table display (because foreach already used above)
$result = mysqli_query($conn, $sql);
?>

<div class="card-body table-responsive" style="position: absolute; margin-left:300px;">
    <h3 class="mb-3">Sales Records</h3>

    <!-- Filter Form -->
    <form method="GET" class="mb-4 d-flex flex-wrap gap-2">
        <input type="date" name="from_date" value="<?= htmlspecialchars($from_date) ?>" class="form-control w-auto">
        <input type="date" name="to_date" value="<?= htmlspecialchars($to_date) ?>" class="form-control w-auto">
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="view_Sell.php" class="btn btn-secondary">Reset</a>
    </form>

    <!-- Total Sales -->
    <div class="mb-3">
        <strong>Total Sales: </strong> Rs <?= number_format($total_sales, 2) ?>
    </div>

    <table class="table table-bordered table-hover align-middle w-75">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0):
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><img src="../../<?= htmlspecialchars($row['product_image']) ?>" width="60" height="60" class="rounded"></td>
                    <td>Rs <?= number_format($row['product_price'], 2) ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td>Rs <?= number_format($row['subtotal'], 2) ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="7" class="text-center text-danger">No sales records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include './../include/footer.php'; ?>
