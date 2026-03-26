<?php
session_start();
include("../includes/db.php");
include("../includes/functions.php");

redirectIfLoggedIn();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows > 0) {
            $message = "Email already registered.";
        } else {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                $message = "Account created successfully. <a href='login.php'>Login here</a>";
            } else {
                $message = "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickBite | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="login-page">
    <div class="container">
        <div class="row g-0 login-box shadow-lg rounded-4">
            <div class="col-lg-6">
                <div class="login-left">
                    <h1>Create Your Account</h1>
                    <p>Join QuickBite and enjoy fast, fresh, and delicious meals anytime.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-right">
                    <h2>Create Account</h2>
                    <p class="text-muted mb-4">Fill in your details to register.</p>

                    <?php if ($message != ""): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <button type="submit" class="btn btn-main w-100 mb-3">Create Account</button>

                        <p class="text-center mb-0 login-links">
                            Already have an account? <a href="login.php">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>