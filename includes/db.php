<?php
$host = "localhost";
$user = "root";
$pass = "shamla";
$dbname = "quickbite_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>