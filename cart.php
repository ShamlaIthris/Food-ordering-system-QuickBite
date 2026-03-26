<?php
session_start();
include("includes/functions.php");

checkLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite | Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold d-flex align-items-center text-danger" href="index.php">
            <i class="fa-solid fa-utensils me-2"></i>
            QuickBite
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link active" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>

        <!-- User -->
        <div>
            <span class="me-2 fw-semibold">Hi, <?php echo $_SESSION["username"]; ?></span>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<!-- Cart Section -->
<section class="container py-5">
    <h1 class="fw-bold mb-2">Your Cart</h1>
    <p class="text-muted mb-4">Review your selected items before checkout.</p>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="cart-page-box">
                <div id="cart-items"></div>

                <div id="empty-cart-message" class="text-center py-4 text-muted d-none">
                    Your cart is empty.
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="cart-summary-box">
                <h4 class="fw-bold mb-4">Cart Summary</h4>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span id="cart-subtotal">Rs.0.00</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Delivery Fee</span>
                    <span id="delivery-fee">Rs.350</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Tax</span>
                    <span id="tax-amount">Rs.0.00</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between mb-4">
                    <strong>Total</strong>
                    <strong id="cart-total">Rs.0.00</strong>
                </div>

                <a href="menu.php" class="btn btn-outline-dark w-100 mb-3">Continue Shopping</a>
                <a href="order.php" class="btn btn-main w-100">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer py-4 bg-dark text-white">
    <div class="container text-center">
        <h5 class="footer-title">QuickBite</h5>
        <p class="text-white-50 mb-4">Your favorite food ordering website for fast, fresh, and delicious meals.</p>
        
        <div class="d-flex justify-content-center align-items-center gap-4 my-3 footer-contact-info">
            <div class="contact-item">
                <i class="fa-solid fa-location-dot me-2 text-danger"></i>
                <span>Colombo, Sri Lanka</span> 
            </div>

            <div class="vr mx-2"></div> 

            <div class="contact-item">
                <i class="fa-solid fa-phone me-2"></i>
                <span>+94 77 123 4567</span>
            </div>

            <div class="vr mx-2"></div>

            <div class="contact-item">
                <i class="fa-solid fa-envelope me-2"></i>
                <span>support@quickbite.com</span>
            </div>
        </div>

        <hr>
        <p class="mb-0 text-secondary">&copy; 2026 QuickBite. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>