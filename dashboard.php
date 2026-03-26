<?php
session_start();
include("includes/db.php");
include("includes/functions.php");

checkLogin();

$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
$email = $_SESSION["email"];

$userSql = "SELECT created_at FROM users WHERE id = '$user_id'";
$userResult = $conn->query($userSql);
$userData = $userResult->fetch_assoc();
$memberSince = $userData ? date("d F Y", strtotime($userData["created_at"])) : "N/A";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center text-danger" href="index.php">
            <i class="fa-solid fa-utensils me-2"></i>
            QuickBite
        </a>

        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="dashboard-card-pro text-center">

                <div class="dashboard-top-icon mb-4">
                    <i class="fa-solid fa-user"></i>
                </div>

                <p class="dashboard-subtitle mb-2">My Dashboard</p>

                <h1 class="dashboard-main-title mb-3">
                    Welcome, <span class="text-danger"><?php echo htmlspecialchars($username); ?></span>
                </h1>

                <p class="dashboard-desc mb-4">
                    We’re happy to see you again at QuickBite.
                </p>

                <div class="row g-3 justify-content-center mb-4">
                    <div class="col-md-5">
                        <div class="dashboard-info-box">
                            <i class="fa-solid fa-envelope me-2 text-danger"></i>
                            <strong>Email:</strong>
                            <span><?php echo htmlspecialchars($email); ?></span>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="dashboard-info-box">
                            <i class="fa-solid fa-calendar-days me-2 text-danger"></i>
                            <strong>Member Since:</strong>
                            <span><?php echo htmlspecialchars($memberSince); ?></span>
                        </div>
                    </div>
                </div>

                <div class="dashboard-note mb-4">
                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                    Your account is active and ready to use.
                </div>

                <a href="index.php" class="btn btn-main px-5 py-2">Go to Home</a>
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