<?php
require "common.php"; // Adjust the path if necessary

if (!isset($_SESSION['email'])) {
    header('location: ../index.php');
}

$user_id = $_SESSION['user_id'];

// Loop through the POST data to handle size selections
foreach ($_POST as $key => $value) {
    if (strpos($key, 'size_') === 0) {
        $item_id = str_replace('size_', '', $key); // Extract item ID from the key
        $size = mysqli_real_escape_string($con, $value); // Sanitize the size input

        // Update the size in the `users_products` table
        $query = "UPDATE users_products SET size='$size' WHERE item_id='$item_id' AND user_id='$user_id' AND status='Added To Cart'";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
}

// Redirect to the success page after updating sizes
header('location: ../success.php');
?>