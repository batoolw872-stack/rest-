<?php
session_start();
include './../include/sidebar.php';
include './../include/header.php';
require '../../backend/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap and Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .main-content {
            margin-left: 250px; /* Adjust if your sidebar width is different */
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
            <a href="./add_product.php" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to Add Product
            </a>
            
        </div>

        <!-- Alerts -->
        <?php
        if (isset($_SESSION['dele2'])) {
            echo '<div class="alert alert-' . $_SESSION['dele2']['type'] . '">' . $_SESSION['dele2']['massage'] . '</div>';
            unset($_SESSION['dele2']);
        }

        if (isset($_SESSION['update2'])) {
            echo '<div class="alert alert-' . $_SESSION['update2']['type'] . '">' . $_SESSION['update2']['message'] . '</div>';
            unset($_SESSION['update2']);
        }

        $query = "SELECT p.*, c.cat_name FROM product p LEFT JOIN cat c ON p.cat_id = c.id";
        $res = mysqli_query($conn, $query);
        ?>

        
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h1 class="h4 mb-0">View Product</h1>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sno</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $sn++;
                                ?>
                                <tr>
                                    <td><?= $sn ?></td>
                                    <td><?= $row['cat_name'] ?></td>
                                    <td><?= $row['p_name'] ?></td>
                                    <td><?= $row['p_price'] ?></td>
                                    <td><img src="./../img/<?= $row['p_img'] ?>" class="w-25 img-fluid" alt="Product Image"></td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#delete<?= $row['p_id'] ?>">
                                            <i class="fa-solid fa-trash" style="color:red;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#update<?= $row['p_id'] ?>">
                                            <i class="fa-solid fa-pen" style="color:green;"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete<?= $row['p_id'] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Delete Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete <b><?= $row['p_name'] ?></b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="./../../backend/product_backend.php?delete=<?= $row['p_id'] ?>" class="btn btn-danger">Yes</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Update Modal -->
                                <div class="modal fade" id="update<?= $row['p_id'] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="./../../backend/product_backend.php?update_id=<?= $row['p_id'] ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5>Update Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Product Name</label>
                                                    <input type="text" name="name" value="<?= $row['p_name'] ?>" class="form-control" required>
                                                    <label class="mt-2">Price</label>
                                                    <input type="text" name="price" value="<?= $row['p_price'] ?>" class="form-control" required>
                                                    <label class="mt-2">Category</label>
                                                    <select name="category_id" class="form-control">
                                                        <?php
                                                        $cat_query = mysqli_query($conn, "SELECT * FROM cat");
                                                        while ($cat = mysqli_fetch_assoc($cat_query)) {
                                                            $sel = ($cat['id'] == $row['cat_id']) ? "selected" : "";
                                                            echo "<option value='" . $cat['id'] . "' $sel>" . $cat['cat_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label class="mt-2">Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" name="edit" value="Update" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
