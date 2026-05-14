<?php
session_start();
include "./../include/sidebar.php";
include "./../include/header.php";
require '../../backend/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .main-content {
            margin-left: 250px; /* adjust if your sidebar is different width */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
     .card-header {
             display: flex;
            justify-content: space-between;
            align-items: center;
     }     
   
  </style>
    
</head>
<body>

<main class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow">

                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Add Product</h4>
                         <a href="./view_product.php" class="btn btn-info">
                         <i class="fa-solid fa-arrow-right me-1"></i> Go to View Product
                        </a>
                    </div>

                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['hi2'])) {
                            echo '<div class="alert alert-' . $_SESSION['hi2']['type'] . '">' . $_SESSION['hi2']['massage'] . '</div>';
                            unset($_SESSION['hi2']);
                        }
                        ?>

                        <!-- Form Start -->
                        <form action="./../../backend/product_backend.php" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $query = "SELECT * FROM cat";
                                        $cat_query = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($cat_query)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['cat_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Product Description</label>
                                    <input type="text" name="desc" class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                                <div class="col-12 mt-4 text-center">
                                    <input type="submit" name="add" value="Add Product" class="btn btn-dark px-4">
                                </div>

                            </div>
                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
