<?php

function checkLogin() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

function redirectIfLoggedIn() {
    if (isset($_SESSION["user_id"])) {
        header("Location: ../index.php");
        exit();
    }
}

function showAlertAndRedirect($message, $page) {
    echo "<script>
        alert(" . json_encode($message) . ");
        window.location.href = " . json_encode($page) . ";
    </script>";
    exit();
}
?>