<?php
session_start();

header('Content-Type: application/json');

session_start();
header('Content-Type: application/json');

// Debug session data
if (isset($_SESSION['cart'])) {
    error_log(print_r($_SESSION['cart'], true)); // Logs cart data to the server's error log
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product already exists in the cart
    $productExists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['quantity'] += 1; // Increment quantity if product exists
            $productExists = true;
            break;
        }
    }

    // If the product doesn't exist, add it to the cart
    if (!$productExists) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
    }

    // Return a success message
    echo json_encode(['message' => "$productName has been added to your cart."]);
    exit;
}

// If the request method is not POST, return an error
echo json_encode(['message' => 'Invalid request.']);
exit;