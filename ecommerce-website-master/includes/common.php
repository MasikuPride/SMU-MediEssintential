<?php
// filepath: c:\xampp\htdocs\ecommerce-website-master\includes\common.php

// Ensure no output before this point
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

// Establish a connection to the database
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set default timezone (optional, adjust as needed)
date_default_timezone_set("UTC");

// Additional common functions or configurations can be added here
?>