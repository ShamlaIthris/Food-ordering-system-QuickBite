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
    <title>QuickBite | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<!-- navbar -->
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
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div id="navbar-user-area">
            <span class="me-2 fw-semibold">Hi, <?php echo $_SESSION["username"]; ?></span>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<section>
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('images/hero1.jpg') center/cover no-repeat;">
                    <div class="container text-center text-white">
                        <h1>Delicious Food Delivered Fast</h1>
                        <p>Fresh ingredients, expert chefs, and lightning-fast delivery to your doorstep.</p>
                        <a href="menu.php" class="btn btn-main mt-3">Explore Menu</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('images/hero2.jpg') center/cover no-repeat;">
                    <div class="container text-center text-white">
                        <h1>Taste the Best Burgers & Pizza</h1>
                        <p>Order your favorite meals anytime with QuickBite.</p>
                        <a href="menu.php" class="btn btn-main mt-3">Order Now</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('images/hero3.jpg') center/cover no-repeat;">
                    <div class="container text-center text-white">
                        <h1>Fast Delivery, Fresh Food</h1>
                        <p>Enjoy hot and tasty meals delivered to your home in minutes.</p>
                        <a href="contact.php" class="btn btn-main mt-3">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<section class="container py-5">
    <h2 class="section-title mb-4">Main Menu Categories</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card menu-card">
                <img src="images/burger.jpg" class="card-img-top" alt="Burger">
                <div class="card-body text-center">
                    <h4>Burgers</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card">
                <img src="images/pizza.jpg" class="card-img-top" alt="Pizza">
                <div class="card-body text-center">
                    <h4>Pizza</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card menu-card">
                <img src="images/biryani.jpg" class="card-img-top" alt="Biryani">
                <div class="card-body text-center">
                    <h4>Biryani</h4>
                </div>
            </div>
        </div>
    </div>
</section>

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
</body>
</html>