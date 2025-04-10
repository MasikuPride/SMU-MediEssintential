<?php
require("includes/common.php");

header('Content-Type: application/json');

// Check if REQUEST_METHOD is set
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["message" => "Invalid request method."]);
    exit;
}

session_start();
$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

if (!$userId) {
    echo json_encode(["message" => "Please log in to place an order."]);
    exit;
}

if (!isset($_POST["productId"]) || !isset($_POST["productName"]) || !isset($_POST["productPrice"])) {
    echo json_encode(["message" => "Invalid order request."]);
    exit;
}

$productId = $_POST["productId"];
$productName = $_POST["productName"];
$productPrice = $_POST["productPrice"];

$stmt = $con->prepare("INSERT INTO orders (user_id, product_id, product_name, product_price, status) VALUES (?, ?, ?, ?, 'Pending')");
$stmt->bind_param("iiss", $userId, $productId, $productName, $productPrice);

if ($stmt->execute()) {
    echo json_encode(["message" => "Order placed for $productName successfully!"]);
} else {
    echo json_encode(["message" => "Error: " . $stmt->error]);
}

$stmt->close();
?>