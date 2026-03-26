<?php
session_start();
include("../includes/db.php");
include("../includes/functions.php");

redirectIfLoggedIn();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];

                header("Location: ../dashboard.php");
                exit();
            } else {
                $message = "Invalid password.";
            }
        } else {
            $message = "No account found with this email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="login-page">
    <div class="container">
        <div class="row g-0 login-box shadow-lg rounded-4">

            <div class="col-lg-6">
                <div class="login-left">
                    <h1>Welcome to QuickBite</h1>
                    <p>Order your favorite meals quickly and easily.</p>
                    <p class="mt-3">Sign in to explore our delicious menu and place your order.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-right">
                    <h2>Login</h2>
                    <p class="text-muted mb-4">Please enter your details to sign in.</p>

                    <?php if ($message != ""): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <button type="submit" class="btn btn-main w-100 mb-3">Login</button>

                        <p class="text-center mb-0 login-links">
                            Don’t have an account? <a href="register.php">Create Account</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>