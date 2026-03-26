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
    <title>QuickBite | Full Menu</title>
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
                    <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
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

    <!-- Menu Intro -->
    <section class="container py-5">
        <h1 class="fw-bold mb-2">Explore Our Full Menu</h1>
        <p class="text-muted mb-4">
            From our famous biryanis to juicy burgers and refreshing drinks, we have something for every craving.
        </p>

        <!-- Search bar -->
        <div class="mb-4 text-center">
            <input type="text" id="menuSearch" class="form-control w-50 mx-auto" placeholder="Search food items..." onkeyup="searchMenu()">
        </div>

        <!-- Filter Buttons -->
        <div class="category-buttons mb-4">
            <button class="category-btn active" onclick="filterMenu('all', this)">All</button>
            <button class="category-btn" onclick="filterMenu('biryani', this)">Biryani</button>
            <button class="category-btn" onclick="filterMenu('burger', this)">Burgers</button>
            <button class="category-btn" onclick="filterMenu('pizza', this)">Pizza</button>
            <button class="category-btn" onclick="filterMenu('fries', this)">Fries</button>
            <button class="category-btn" onclick="filterMenu('drinks', this)">Drinks</button>
            <button class="category-btn" onclick="filterMenu('chicken', this)">Chicken</button>
        </div>

        <!-- Menu Grid -->
        <div class="row g-4">

            <!-- Biryani -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Chicken Biryani.jpg" class="card-img-top" alt="Chicken Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Biryani</h5>
                        <p class="card-text">Aromatic rice with spiced chicken and rich flavor.</p>
                        <p class="price">Rs.1200</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chicken Biryani', 1200)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Mutton Biryani.jpg" class="card-img-top" alt="Mutton Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Mutton Biryani</h5>
                        <p class="card-text">Tender mutton cooked with fragrant basmati rice.</p>
                        <p class="price">Rs.1550</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Mutton Biryani', 1550)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Egg Biryani.jpg" class="card-img-top" alt="Egg Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Egg Biryani</h5>
                        <p class="card-text">Flavorful biryani served with boiled eggs and spices.</p>
                        <p class="price">Rs.800</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Egg Biryani', 800)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Beef Biryani.jpg" class="card-img-top" alt="Beef Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Beef Biryani</h5>
                        <p class="card-text">Rich beef biryani with bold spices and herbs.</p>
                        <p class="price">Rs.1400</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Beef Biryani', 1400)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Vegetable Biryani.jpg" class="card-img-top" alt="Vegetable Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Vegetable Biryani</h5>
                        <p class="card-text">Mixed vegetable biryani with delicious seasoning.</p>
                        <p class="price">Rs.850</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Vegetable Biryani', 850)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/Special Mixed Biryani.jpg" class="card-img-top" alt="Special Mixed Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Special Mixed Biryani</h5>
                        <p class="card-text">Special biryani with mixed meat and rich aroma.</p>
                        <p class="price">Rs.1650</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Special Mixed Biryani', 1650)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item biryani">
                <div class="card menu-card h-100">
                    <img src="images/prawn biryani.jpg" class="card-img-top" alt="Prawn Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Prawn Biryani</h5>
                        <p class="card-text">Delicious prawn biryani with aromatic rice and spices.</p>
                        <p class="price">Rs.1450</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Prawn Biryani', 1450)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Burgers -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Classic Beef Burger.jpg" class="card-img-top" alt="Classic Beef Burger">
                    <div class="card-body">
                        <h5 class="card-title">Classic Beef Burger</h5>
                        <p class="card-text">Juicy beef patty with cheese, lettuce, and tomato.</p>
                        <p class="price">Rs.1000</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Classic Beef Burger', 1000)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Chicken Burger.jpg" class="card-img-top" alt="Chicken Burger">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Burger</h5>
                        <p class="card-text">Crispy chicken burger with fresh salad and mayo.</p>
                        <p class="price">Rs.900</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chicken Burger', 900)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Double Cheese Burger.jpg" class="card-img-top" alt="Double Cheese Burger">
                    <div class="card-body">
                        <h5 class="card-title">Double Cheese Burger</h5>
                        <p class="card-text">Double-layer burger with melted cheese and sauce.</p>
                        <p class="price">Rs.1200</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Double Cheese Burger', 1200)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Mushroom Burger.jpg" class="card-img-top" alt="Mushroom Burger">
                    <div class="card-body">
                        <h5 class="card-title">Mushroom Burger</h5>
                        <p class="card-text">Tender burger topped with creamy mushroom sauce.</p>
                        <p class="price">Rs.780</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Mushroom Burger', 780)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Veggie Burger.jpg" class="card-img-top" alt="Veggie Burger">
                    <div class="card-body">
                        <h5 class="card-title">Veggie Burger</h5>
                        <p class="card-text">Healthy veggie patty burger with fresh greens.</p>
                        <p class="price">Rs.700</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Veggie Burger', 700)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Zinger Burger.jpg" class="card-img-top" alt="Zinger Burger">
                    <div class="card-body">
                        <h5 class="card-title">Zinger Burger</h5>
                        <p class="card-text">Spicy crispy chicken burger with creamy sauce.</p>
                        <p class="price">Rs.1100</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Zinger Burger', 1100)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item burger">
                <div class="card menu-card h-100">
                    <img src="images/Grilled Chicken Burger.jpg" class="card-img-top" alt="Grilled Chicken Burger">
                    <div class="card-body">
                        <h5 class="card-title">Grilled Chicken Burger</h5>
                        <p class="card-text">Grilled chicken burger with herbs and cheese.</p>
                        <p class="price">Rs.1150</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Grilled Chicken Burger', 1150)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Pizza -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/Margherita Pizza.jpg" class="card-img-top" alt="Margherita Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Margherita Pizza</h5>
                        <p class="card-text">Classic pizza with mozzarella cheese and basil.</p>
                        <p class="price">Rs.2750</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Margherita Pizza', 2750)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/Pepperoni Pizza.jpg" class="card-img-top" alt="Pepperoni Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Pepperoni Pizza</h5>
                        <p class="card-text">Cheesy pizza topped with pepperoni and herbs.</p>
                        <p class="price">Rs.3600</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Pepperoni Pizza', 3600)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/Veggie Pizza.jpg" class="card-img-top" alt="Veggie Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Veggie Pizza</h5>
                        <p class="card-text">Loaded with fresh vegetables and rich tomato sauce.</p>
                        <p class="price">Rs.2500</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Veggie Pizza', 2500)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/BBQ Chicken Pizza.jpg" class="card-img-top" alt="BBQ Chicken Pizza">
                    <div class="card-body">
                        <h5 class="card-title">BBQ Chicken Pizza</h5>
                        <p class="card-text">Smoky BBQ chicken pizza with cheese and onions.</p>
                        <p class="price">Rs.3300</p>
                        <button class="btn btn-main w-100" onclick="addToCart('BBQ Chicken Pizza', 3300)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/Chicken Tikka Pizza.jpg" class="card-img-top" alt="Chicken Tikka Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Tikka Pizza</h5>
                        <p class="card-text">Spicy chicken tikka topping with cheese and peppers.</p>
                        <p class="price">Rs.3500</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chicken Tikka Pizza', 3500)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/Cheese Lover’s Pizza.jpg" class="card-img-top" alt="Cheese Lover's Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Cheese Lover's Pizza</h5>
                        <p class="card-text">Extra cheesy pizza for true cheese lovers.</p>
                        <p class="price">Rs.3700</p>
                        <button class="btn btn-main w-100" onclick="addToCart(`Cheese Lover's Pizza`, 3700)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item pizza">
                <div class="card menu-card h-100">
                    <img src="images/panneer tikka pizza.jpg" class="card-img-top" alt="Special Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Special Pizza</h5>
                        <p class="card-text">House special pizza with rich toppings and cheese.</p>
                        <p class="price">Rs.2800</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Panneer tikka Pizza', 2800)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Fries -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/French Fries.jpg" class="card-img-top" alt="French Fries">
                    <div class="card-body">
                        <h5 class="card-title">French Fries</h5>
                        <p class="card-text">Golden crispy fries served hot and fresh.</p>
                        <p class="price">Rs.450</p>
                        <button class="btn btn-main w-100" onclick="addToCart('French Fries', 450)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/Cheese Fries.jpg" class="card-img-top" alt="Cheese Fries">
                    <div class="card-body">
                        <h5 class="card-title">Cheese Fries</h5>
                        <p class="card-text">Crispy fries topped with melted cheese and herbs.</p>
                        <p class="price">Rs.600</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Cheese Fries', 600)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/Peri Peri Fries.jpg" class="card-img-top" alt="Peri Peri Fries">
                    <div class="card-body">
                        <h5 class="card-title">Peri Peri Fries</h5>
                        <p class="card-text">Spicy peri peri fries with bold seasoning.</p>
                        <p class="price">Rs.580</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Peri Peri Fries', 580)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/Loaded Fries.jpg" class="card-img-top" alt="Loaded Fries">
                    <div class="card-body">
                        <h5 class="card-title">Loaded Fries</h5>
                        <p class="card-text">Fries topped with cheese, sauce, and tasty extras.</p>
                        <p class="price">Rs.850</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Loaded Fries', 850)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/Crispy Salted Fries.jpg" class="card-img-top" alt="Crispy Salted Fries">
                    <div class="card-body">
                        <h5 class="card-title">Crispy Salted Fries</h5>
                        <p class="card-text">Hot crispy fries lightly seasoned with salt.</p>
                        <p class="price">Rs.480</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Crispy Salted Fries', 480)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item fries">
                <div class="card menu-card h-100">
                    <img src="images/Spicy Fries.jpg" class="card-img-top" alt="Spicy Fries">
                    <div class="card-body">
                        <h5 class="card-title">Spicy Fries</h5>
                        <p class="card-text">Crunchy fries with spicy seasoning and flavor.</p>
                        <p class="price">Rs.570</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Spicy Fries', 570)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Drinks -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Fresh Orange Juice.jpg" class="card-img-top" alt="Fresh Orange Juice">
                    <div class="card-body">
                        <h5 class="card-title">Fresh Orange Juice</h5>
                        <p class="card-text">Chilled fresh juice made from sweet oranges.</p>
                        <p class="price">Rs.450</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Fresh Orange Juice', 450)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Chocolate Milkshake.jpg" class="card-img-top" alt="Chocolate Milkshake">
                    <div class="card-body">
                        <h5 class="card-title">Chocolate Milkshake</h5>
                        <p class="card-text">Cold creamy milkshake topped with chocolate flavor.</p>
                        <p class="price">Rs.840</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chocolate Milkshake', 840)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Lemon Mint Cooler.jpg" class="card-img-top" alt="Lemon Mint Cooler">
                    <div class="card-body">
                        <h5 class="card-title">Lemon Mint Cooler</h5>
                        <p class="card-text">Refreshing lemon drink with cool mint flavor.</p>
                        <p class="price">Rs.400</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Lemon Mint Cooler', 400)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Mango Juice.jpg" class="card-img-top" alt="Mango Juice">
                    <div class="card-body">
                        <h5 class="card-title">Mango Juice</h5>
                        <p class="card-text">Sweet mango juice served chilled and fresh.</p>
                        <p class="price">Rs.570</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Mango Juice', 570)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Strawberry Smoothie.jpg" class="card-img-top" alt="Strawberry Smoothie">
                    <div class="card-body">
                        <h5 class="card-title">Strawberry Smoothie</h5>
                        <p class="card-text">Fruity smoothie with sweet strawberry taste.</p>
                        <p class="price">Rs.850</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Strawberry Smoothie', 850)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/Iced Coffee.jpg" class="card-img-top" alt="Iced Coffee">
                    <div class="card-body">
                        <h5 class="card-title">Iced Coffee</h5>
                        <p class="card-text">Cold creamy coffee drink served with ice.</p>
                        <p class="price">Rs.600</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Iced Coffee', 600)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item drinks">
                <div class="card menu-card h-100">
                    <img src="images/vannila milkshake.jpg" class="card-img-top" alt="Vannila Milkshake">
                    <div class="card-body">
                        <h5 class="card-title">Vannila Milkshake</h5>
                        <p class="card-text">Creamy vanilla milkshake blended with rich ice cream and chilled milk.</p>
                        <p class="price">Rs.790</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Vannila Milkshake', 790)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Chicken -->
            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/BBQ Chicken.jpg" class="card-img-top" alt="BBQ Chicken">
                    <div class="card-body">
                        <h5 class="card-title">BBQ Chicken</h5>
                        <p class="card-text">Smoky BBQ chicken cooked with rich flavor.</p>
                        <p class="price">Rs.3100</p>
                        <button class="btn btn-main w-100" onclick="addToCart('BBQ Chicken', 3100)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Chicken Nuggets.jpg" class="card-img-top" alt="Chicken Nuggets">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Nuggets</h5>
                        <p class="card-text">Golden chicken nuggets served hot and crispy.</p>
                        <p class="price">Rs.1200</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chicken Nuggets', 1200)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Fried Chicken.jpg" class="card-img-top" alt="Fried Chicken">
                    <div class="card-body">
                        <h5 class="card-title">Fried Chicken</h5>
                        <p class="card-text">Crispy fried chicken with delicious seasoning.</p>
                        <p class="price">Rs.1900</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Fried Chicken', 1900)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Chicken Popcorn.jpg" class="card-img-top" alt="Chicken Popcorn">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Popcorn</h5>
                        <p class="card-text">Bite-sized crispy chicken pieces full of flavor.</p>
                        <p class="price">Rs.1550</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Chicken Popcorn', 1550)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Hot Crispy Chicken.jpg" class="card-img-top" alt="Hot Crispy Chicken">
                    <div class="card-body">
                        <h5 class="card-title">Hot Crispy Chicken</h5>
                        <p class="card-text">Crunchy chicken with extra spicy crispy coating.</p>
                        <p class="price">Rs.2100</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Hot Crispy Chicken', 2100)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Spicy Chicken Wings.jpg" class="card-img-top" alt="Spicy Chicken Wings">
                    <div class="card-body">
                        <h5 class="card-title">Spicy Chicken Wings</h5>
                        <p class="card-text">Hot crispy chicken wings with spicy sauce.</p>
                        <p class="price">Rs.1800</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Spicy Chicken Wings', 1800)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 menu-item chicken">
                <div class="card menu-card h-100">
                    <img src="images/Grilled Chicken.jpg" class="card-img-top" alt="Grilled Chicken">
                    <div class="card-body">
                        <h5 class="card-title">Grilled Chicken</h5>
                        <p class="card-text">Tender grilled chicken with herbs and seasoning.</p>
                        <p class="price">Rs.2700</p>
                        <button class="btn btn-main w-100" onclick="addToCart('Grilled Chicken', 2700)">Add to Cart</button>
                    </div>
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