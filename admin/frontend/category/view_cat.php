<?php
session_start();

include './../include/sidebar.php';
include './../include/header.php';
require '../../backend/config/config.php';

$query = "SELECT * FROM cat";
$res = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Category List</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .main-content {
      margin-left: 250px; 
      padding: 20px;
    }

    .card-custom {
      background-color: #ffffff;
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .btn-gold {
      background-color: #f5cf0f;
      color: #000;
      font-weight: 600;
    }

    .btn-gold:hover {
      background-color: #e0ba00;
      color: white;
    }

    .category-img {
      width: 100px;
      height: auto;
      border-radius: 6px;
    }

    .modal-header {
      background-color: #f5cf0f;
    }

    .modal-title {
      font-weight: bold;
      color: black;
    }

    .modal-footer .btn {
      min-width: 90px;
    }

    .action-btns i {
      font-size: 1.25rem;
      cursor: pointer;
    }

    .table thead {
      background-color: #343a40;
      color: white;
    }

    .alert {
      font-weight: 500;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>

<div class="main-content">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="./add_cat.php" class="btn btn-dark">
      <i class="fa-solid fa-arrow-left me-1"></i> Back to Add Category
    </a>
    <a href="./../product/add_product.php" class="btn btn-dark">
      <i class="fa-solid fa-arrow-right me-1"></i> Go to Products
    </a>
  </div>

  <div class="card card-custom p-4">
    <h3 class="text-dark mb-4 text-center" style="font-weight: 700;">All Categories</h3>

    <?php
    // if (isset($_SESSION['delete'])) {
    //   echo '<div class="alert alert-' . $_SESSION['delete']['type'] . '">' . $_SESSION['delete']['message'] . '</div>';
    //   unset($_SESSION['delete']);
    // }
    if (isset($_SESSION['delete'])) {
  echo '<div class="alert alert-' . $_SESSION['delete']['type'] . ' alert-dismissible fade show" role="alert">'
        . $_SESSION['delete']['message'] . 
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  unset($_SESSION['delete']);
}


    if (isset($_SESSION['update'])) {
      echo '<div class="alert alert-' . $_SESSION['update']['type'] . '">' . $_SESSION['update']['message'] . '</div>';
      unset($_SESSION['update']);
    }

    
    ?>

    <table class="table table-bordered table-hover text-center align-middle">
      <thead>
        <tr>
          <th>Serial No</th>
          <th>Category Name</th>
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
            <td><img src="./../img/<?= $row['cat_img'] ?>" class="category-img"></td>
            <td class="action-btns">
              <a data-bs-toggle="modal" data-bs-target="#delete=<?= $row['id'] ?>">
                <i class="fa-solid fa-trash text-danger"></i>
              </a>
            </td>
            <td class="action-btns">
              <a data-bs-toggle="modal" data-bs-target="#update=<?= $row['id'] ?>">
                <i class="fa-solid fa-pen-to-square text-primary"></i>
              </a>
            </td>
          </tr>

          <!-- Delete Modal -->
          <div class="modal fade" id="delete=<?= $row['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete <strong><?= $row['cat_name'] ?></strong>?
                </div>
                <div class="modal-footer">
                  <a href="./../../backend/cat_backend.php?delete=<?= $row['id'] ?>" class="btn btn-success">Yes</a>
                  <button class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Update Modal -->
          <div class="modal fade" id="update=<?=$row['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="./../../backend/cat_backend.php?update=<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" name="name" value="<?= $row['cat_name'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                  <label for="" class="form-label">Category Image</label>
            <input type="file" name="image" value="<?= $row['cat_img'] ?>" class="form-control" placeholder="Category Name">

                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="edit" value="Update" class="btn btn-success">
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
