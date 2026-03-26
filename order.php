<?php
session_start();
include("includes/db.php");
include("includes/functions.php");

checkLogin();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $fullName = trim($_POST["fullName"]);
    $phone = trim($_POST["phoneNumber"]);
    $email = trim($_POST["emailAddress"]);
    $street = trim($_POST["streetAddress"]);
    $city = trim($_POST["city"]);
    $landmark = trim($_POST["landmark"]);
    $payment = isset($_POST["paymentMethod"]) ? trim($_POST["paymentMethod"]) : "";
    $instructions = trim($_POST["specialInstructions"]);

    $orderItems = $_POST["order_items"];
    $subtotal = $_POST["subtotal"];
    $delivery = $_POST["delivery"];
    $tax = $_POST["tax"];
    $total = $_POST["total"];

    if (
        $fullName == "" ||
        $phone == "" ||
        $email == "" ||
        $street == "" ||
        $city == "" ||
        $payment == "" ||
        $orderItems == "" ||
        $total == ""
    ) {
        $message = "Please fill in all required fields.";
    } else {
        $sql = "INSERT INTO orders 
        (user_id, full_name, phone, email, street_address, city, landmark, payment_method, special_instructions, order_items, subtotal, delivery_fee, tax, total_amount)
        VALUES 
        ('$user_id', '$fullName', '$phone', '$email', '$street', '$city', '$landmark', '$payment', '$instructions', '$orderItems', '$subtotal', '$delivery', '$tax', '$total')";

        if ($conn->query($sql) === TRUE) {
             echo "<script>
                alert('Order placed successfully!');
                localStorage.removeItem('cart');
                window.location.href = 'index.php';
             </script>";
             exit();
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
    <title>QuickBite | Order</title>
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
                <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div id="navbar-user-area">
            <span class="me-2 fw-semibold">Hi, <?php echo $_SESSION["username"]; ?></span>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<section class="container py-5">
    <h1 class="fw-bold mb-2">Checkout</h1>
    <p class="text-muted mb-4">Complete your order details below.</p>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="order-box">

                <?php if ($message != ""): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>

                <form id="orderForm" method="POST" action="" onsubmit="return placeOrder(event)">
                    <h4 class="fw-bold mb-3">Customer Information</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" autocomplete="email" placeholder="Enter your email">
                    </div>

                    <h4 class="fw-bold mt-4 mb-3">Delivery Address</h4>

                    <div class="mb-3">
                        <label for="streetAddress" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Enter street address">
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="landmark" class="form-label">Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Nearby landmark">
                        </div>
                    </div>

                    <h4 class="fw-bold mt-4 mb-3">Payment Method</h4>

                    <div class="payment-methods mb-3">
                        <label class="payment-option mb-3">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="cashOnDelivery" value="Cash on Delivery" onclick="togglePaymentFields()">
                            <span class="payment-label">
                                <i class="fa-solid fa-money-bill-wave text-success me-2"></i>
                                Cash on Delivery
                            </span>
                        </label>

                        <label class="payment-option mb-3">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="creditCard" value="Credit / Debit Card" onclick="togglePaymentFields()">
                            <span class="payment-label">
                                <i class="fa-regular fa-credit-card text-primary me-2"></i>
                                Credit / Debit Card
                            </span>
                        </label>

                        <label class="payment-option">
                            <input class="form-check-input me-2" type="radio" name="paymentMethod" id="onlinePayment" value="Online Payment" onclick="togglePaymentFields()">
                            <span class="payment-label">
                                <i class="fa-solid fa-mobile-screen-button text-warning me-2"></i>
                                Online Payment
                            </span>
                        </label>
                    </div>

                    <div id="cardDetailsBox" class="card-details-box d-none">
                        <h5 class="fw-bold mb-3">Card Details</h5>

                        <div class="mb-3">
                            <label for="cardName" class="form-label">Name on Card</label>
                            <input type="text" class="form-control" id="cardName" placeholder="Enter cardholder name">
                        </div>

                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" maxlength="5">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="password" class="form-control" id="cvv" placeholder="123" maxlength="4">
                            </div>
                        </div>

                        <div class="accepted-cards">
                            <i class="fa-brands fa-cc-visa me-2"></i>
                            <i class="fa-brands fa-cc-mastercard me-2"></i>
                            <i class="fa-brands fa-cc-amex me-2"></i>
                            <i class="fa-brands fa-cc-paypal"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="specialInstructions" class="form-label">Special Instructions</label>
                        <textarea class="form-control" id="specialInstructions" name="specialInstructions" rows="4" placeholder="Write special instructions here"></textarea>
                    </div>

                    <input type="hidden" name="order_items" id="order_items">
                    <input type="hidden" name="subtotal" id="order_subtotal_input">
                    <input type="hidden" name="delivery" value="350">
                    <input type="hidden" name="tax" id="order_tax_input">
                    <input type="hidden" name="total" id="order_total_input">

                    <button type="submit" class="btn btn-main w-100 mt-3">Place Order</button>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="order-summary-box">
                <h4 class="fw-bold mb-4">Order Summary</h4>

                <div id="order-items"></div>

                <hr>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span id="order-subtotal">Rs.0.00</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Delivery Fee</span>
                    <span id="order-delivery">Rs.350</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Tax</span>
                    <span id="order-tax">Rs.0.00</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong id="order-total">Rs.0.00</strong>
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
<script src="js/script.js"></script>
</body>
</html>