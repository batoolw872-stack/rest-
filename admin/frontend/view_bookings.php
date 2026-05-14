<?php
session_start();
require '../backend/config/config.php';
include './include/header.php';
include './include/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table Bookings - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .main-content {
            margin-left: 250px; /* Adjust if sidebar is a different width */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<main class="main-content">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4">📋 All Table Bookings</h1>
        </div>

        <?php
        $sql = "SELECT * FROM table_bookings ORDER BY booking_date DESC";
        $result = mysqli_query($conn, $sql);
        ?>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Table No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Persons</th>
                                <th>Booking Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['phone']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= $row['persons'] ?></td>
                                    <td><?= $row['booking_date'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info text-center">
                        No bookings found.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?php include './include/footer.php'; ?>

</body>
</html>
