<?php
require("includes/common.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

// Retrieve delivery details from session
$delivery_details = $_SESSION['delivery_details'];

// Update the status of all items in the cart to "Confirmed"
$user_id = $_SESSION['user_id'];
$query = "UPDATE users_products SET status='Confirmed' WHERE user_id='$user_id' AND status='Added To Cart'";
mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<?php include 'includes/header_menu.php'; ?>

<div class="container mt-5">
    <h2 class="text-success text-center">Your order has been confirmed!</h2>
    <p class="text-center">Thank you for shopping with us. Your order will be delivered to:</p>
    <div class="text-center">
        <p><strong>Name:</strong> <?php echo $delivery_details['fullName']; ?></p>
        <p><strong>Address:</strong> <?php echo $delivery_details['address']; ?></p>
        <p><strong>Phone:</strong> <?php echo $delivery_details['phone']; ?></p>
    </div>
    <div class="text-center mt-4">
        <a href="products.php" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>