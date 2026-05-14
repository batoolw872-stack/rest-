<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .cart-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 50px;
        }
        .cart-items {
            flex: 1 1 65%;
            background: #fff;
            padding: 30px;
            border: 1px solid #eee;
        }
        .cart-summary {
            flex: 1 1 30%;
            background: #f7f7f7;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .cart-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ccc;
            margin-right: 20px;
        }
        .item-details {
            flex-grow: 1;
        }
        .item-name {
            font-weight: bold;
            font-size: 1rem;
            text-transform: uppercase;
        }
        .item-meta {
            font-size: 0.9rem;
            color: #666;
        }
        .item-price {
            font-weight: bold;
            font-size: 1rem;
        }
        .summary-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .summary-line {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 0.95rem;
        }
        .checkout-btn {
            width: 100%;
            background: #000;
            color: #fff;
            border: none;
            padding: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
        }
        .checkout-btn:hover {
            background: #333;
        }
        .action-buttons {
            margin-top: 20px;
        }
        .action-buttons a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container cart-wrapper">
    <!-- Cart Items -->
    <div class="cart-items">
        <h4 class="mb-4">MY SHOPPING BAG</h4>
        <?php if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0): ?>
            <?php
$total = 0;
foreach ($_SESSION['cart_items'] as $item):
    $qty = $item['qty'] ?? 1; // ✅ fallback to 1 if qty is not set
    $item_total = $item['price'] * $qty;
    $total += $item_total;
?>
    <div class="cart-item">
        <img src="./../../<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
        <div class="item-details">
            <div class="item-name"><?= strtoupper($item['name']) ?></div>
            <div class="item-meta">
                ITEM NO: #<?= rand(1000000000,9999999999) ?><br>
                SIZE: OS<br>
                COLOR: DEFAULT<br>
                QTY:
                 <form method="post" action="update_cart.php">
                 <button type="submit" name="decrease" value="<?= $item['id'] ?>">-</button>
                 <input  type="number" name="qty[<?= $item['id'] ?>]" value="<?= $qty ?>" min="1" readonly>
                <button type="submit" name="increase" value="<?= $item['id'] ?>">+</button>
                </form>
<!-- </form> -->


            </div>

            <div class="mt-2">
                <a href="remove_item.php?id=<?= $item['id'] ?>" class="text-decoration-none text-dark me-3">REMOVE</a>
            </div>
        </div>
        <div class="item-price">Rs. <?= $item['price'] ?></div>
    </div>
<?php endforeach; ?>


            <div class="action-buttons">
                <a href="./../menu.php" class="btn btn-dark">← Continue Shopping</a>
                <a href="remove.php" class="btn btn-dark">🗑 Clear Cart</a>
            </div>

        <?php else: ?>
            <div class="alert alert-info">Your cart is empty!</div>
            <a href="./../menu.php" class="btn btn-dark mt-3">← Continue Shopping</a>
        <?php endif; ?>
    </div>

    <!-- Summary Section -->
    <div class="cart-summary">
        <div class="summary-title">SUMMARY</div>
        <div>
            <label for="promo" class="form-label">Do you have a promo code?</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="promo" placeholder="Enter code">
                <button class="btn btn-dark">APPLY</button>
            </div>
        </div>
        <div class="summary-line">
            <span>SUBTOTAL</span>
            <span>Rs. <?= number_format($total ?? 0) ?></span>
        </div>
        <div class="summary-line">
            <span>Shipping</span>
            <span>250</span>
        </div>
        <div class="summary-line fw-bold border-top pt-3">
            <span>ESTIMATED TOTAL</span>
            <span>Rs. <?= number_format(($total ?? 0)+250) ?></span>
        </div>
        <?php if (!empty($_SESSION['cart_items'])): ?>
            <a href="" class="btn btn-dark mt-3 w-100" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                CHECKOUT
            </a>


        <!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
        <!-- ✅ FORM start here inside modal-dialog -->
    <form action="confirm_order.php" method="post">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="checkoutModalLabel">Checkout Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Shipping Address</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <select name="payment_method" class="form-select" required>
                
              <option value="Cash on Delivery">Cash on Delivery</option>
              <option value="Card">Credit/Debit Card</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary w-100">Confirm Order</button>
        </div>
      </div>
    </form>
  </div>
</div>
    

        <?php endif; ?>
        <p class="mt-3 text-muted text-center" style="font-size: 0.9rem;">Need help? Call us at +92-300-0000000</p>
    </div>
</div>
</body>
</html>
