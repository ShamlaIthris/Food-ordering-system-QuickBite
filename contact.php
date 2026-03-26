<?php
session_start();
include("includes/db.php");
include("includes/functions.php");

checkLogin();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $messageText = trim($_POST["message"]);

    if ($name == "" || $email == "" || $messageText == "") {
        $message = "Please fill in all fields.";
    } else {
        $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$messageText')";

        if ($conn->query($sql) === TRUE) {
            showAlertAndRedirect("Message sent successfully!", "index.php");
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite | Contact</title>
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

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div id="navbar-user-area">
            <span class="me-2 fw-semibold">Hi, <?php echo $_SESSION["username"]; ?></span>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<section class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Contact Us</h1>
        <p class="text-muted">We would love to hear from you. Send us your questions, feedback, or suggestions.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="contact-info-box h-100">
                <h4 class="fw-bold mb-4">Get in Touch</h4>

                <div class="contact-info-item mb-3">
                    <h6>Email</h6>
                    <p>support@quickbite.com</p>
                </div>

                <div class="contact-info-item mb-3">
                    <h6>Phone</h6>
                    <p>+94 77 123 4567</p>
                </div>

                <div class="contact-info-item mb-3">
                    <h6>Location</h6>
                    <p>Colombo, Sri Lanka</p>
                </div>

                <div class="contact-info-item">
                    <h6>Working Hours</h6>
                    <p>Monday - Sunday: 9.00 AM - 10.00 PM</p>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="contact-form-box">
                <h4 class="fw-bold mb-4">Send a Message</h4>

                <?php if ($message != ""): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="6" placeholder="Write your message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-main w-100">Send Message</button>
                </form>
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