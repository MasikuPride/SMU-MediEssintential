<?php
session_start();

// Hardcoded admin credentials (replace with database validation for better security)
$admin_username = "admin";
$admin_password = "12345";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('location: admin_dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header('location: admin_login.php');
        exit();
    }
}
?>