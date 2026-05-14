
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>

    <div class="d-flex align-items-center ms-auto">
      <?php if (isset($_SESSION['user_name'])): ?>
        <span class="text-white me-3">
          👤 Hi, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
        </span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
